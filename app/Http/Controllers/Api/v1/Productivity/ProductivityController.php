<?php

namespace App\Http\Controllers\Api\v1\Productivity;

use App\Http\Controllers\Controller;
use App\Services\AdHocAssignment\AdHocAssignmentService;
use App\Services\Schedule\ScheduleService;
use App\Services\User\UserService;
use App\Services\UserAttendance\UserAttendanceService;
use App\Services\WorkAssignment\WorkAssignmentService;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Support\Dto\ListViewData;


class ProductivityController extends Controller
{
    public function __construct(public WorkAssignmentService $workAssignment, public ScheduleService $schedule, public UserAttendanceService $userAttendance, public  UserService $user, public AdHocAssignmentService $adHocAssignment)
    {
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public function all(Request $request): \Illuminate\Http\JsonResponse
    {
        $code = 200;
        $allWorkAssignment = $this->workAssignment->productivityDatatable(ListViewData::fromRequest($request),null);
        $output = ['status' => 'success', 'code' => $code, 'messages' => ['All Work Assignments productivity'], 'data' => $allWorkAssignment];
        return response()->json($output, $code);
    }


    public function byUserId(Request $request): \Illuminate\Http\JsonResponse
    {
        $code = 200;
        $user = $this->user->find($request->userId);
        $filteredUserWorkAssignment = $filteredScheduled = $filteredUserAdHocAssignment = [];
        if($user){
            $userWorkAssignment = $this->workAssignment->datatableUserSubmitted(ListViewData::fromRequest($request),$request->all());
            $userAdhocAssignment = $this->adHocAssignment->datatableUserSubmitted(ListViewData::fromRequest($request),$request->all());
            $schedule = $this->schedule->getByMonth($request);
            if($schedule->isNotEmpty()){
                $scheduleDays = $schedule[0]->scheduleDays;
                $filteredScheduled['schedule'] = $schedule->first()->only(['expiry_from', 'expiry_to','schedule_hours_day','total_working_days']);

                //Schedule
                $scheduleDays->transform(function($item,$key) use(&$filteredScheduled){
                    return $filteredScheduled['scheduleDays'][Carbon::parse($item->working_day)->day] = $item->working_day;
                });

                //Work Assignment
                $userWorkAssignment = $userWorkAssignment->transform(function($item,$key) use(&$filteredUserWorkAssignment){
                    return $filteredUserWorkAssignment[Carbon::parse($item->assigned_date)->day] = $item;
                });

                //Ad Hoc Assignment
                $userAdhocAssignment = $userAdhocAssignment->transform(function($item,$key) use(&$filteredUserAdHocAssignment){
                    return $filteredUserAdHocAssignment[Carbon::parse($item->date)->day] = $item;
                });

                $monthDays = Carbon::now()->month($request->month)->daysInMonth;
                $productivityData =[];
                foreach($filteredScheduled['scheduleDays'] as $day=>$date){

                    $productivityData[$day]['assigned_date'] = $date;
                    $productivityData[$day]['assigned_to'] = $user->name;
                    $productivityData[$day]['assigned_dos'] = 0;
                    $productivityData[$day]['complete_dos'] = 0;
                    $productivityData[$day]['pending_dos'] = 0;
                    $productivityData[$day]['hours'] = 0;
                    $productivityData[$day]['attendance'] = 0;

                    if(!array_key_exists($day,$filteredUserWorkAssignment)){
                        $productivityData[$day]['signoff_hit'] = 0.5;
                    } else{
                        $productivityData[$day]['assigned_dos'] = $filteredUserWorkAssignment[$day]->assigned_dos;
                        $productivityData[$day]['complete_dos'] = $filteredUserWorkAssignment[$day]->logs->sum('dos_complete');
                        $remaining = $filteredUserWorkAssignment[$day]->assigned_dos - $filteredUserWorkAssignment[$day]->logs->sum('dos_complete');
                        $productivityData[$day]['pending_dos'] = $remaining;

                        $productivityData[$day]['hours'] = $filteredUserWorkAssignment[$day]->logs->sum('hours');

                        $productivityData[$day]['signoff_hit'] = 0;
                        $productivityData[$day]['attendance'] = 1;
                    }
                    if(array_key_exists($day,$filteredUserAdHocAssignment)){
                        $productivityData[$day]['signoff_hit'] = 0;
                        $productivityData[$day]['attendance'] = 1;
                        $productivityData[$day]['hours'] = $filteredUserAdHocAssignment[$day]['hour_approved'];
                    }


                    if($filteredScheduled['schedule']['schedule_hours_day'] == $productivityData[$day]['hours']){
                        $productivityData[$day]['productivity_hit'] = 0;
                    } else{
                        $productivityData[$day]['productivity_hit'] = 0.5;
                    }

                }
                $productivityData = collect($productivityData);
                $result['productivity'] = $productivityData->sortKeys();
                $result['stats']['signoff_hits'] = $productivityData->sum('signoff_hit');
                $result['stats']['productivity_hit'] = $productivityData->sum('productivity_hit');
                $result['stats']['hours_utilize'] = $productivityData->sum('hours');
                $result['stats']['hours_total'] = $filteredScheduled['schedule']['schedule_hours_day']*$filteredScheduled['schedule']['total_working_days'];
                $result['stats']['productivity'] = number_format((($result['stats']['hours_utilize']/$result['stats']['hours_total'])*100),'2','.').'%';
                //dd($filteredScheduled,$filteredUserWorkAssignment->sortKeys());
                $output = ['status' => 'success', 'code' => $code, 'messages' => ['All Work Assignments productivity By User ID'], 'data' => $result];
            } else{
                $output = ['status' => 'error', 'code' => 419, 'messages' => ['No schedule is found for this month'], 'data' => null];
            }
        } else{
            $output = ['status' => 'error', 'code' => 419, 'messages' => ['No User found with this ID'], 'data' => null];
        }
        return response()->json($output, $code);
    }
}
