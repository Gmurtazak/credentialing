<?php

namespace App\Http\Controllers\Api\v1\UserAttendance;

use App\Http\Controllers\Controller;
use App\Services\UserAttendance\UserAttendanceService;
use App\Services\EmailService;
use Auth;
use Illuminate\Http\Request;
use App\Support\Dto\ListViewData;


class UserAttendanceController extends Controller
{
    public function __construct(public UserAttendanceService $userAttendance)
    {
    }

    public function all(Request $request): \Illuminate\Http\JsonResponse
    {
        $code = 200;
        $allTeams = $this->userAttendance->datatable(ListViewData::fromRequest($request));
        $output = ['status' => 'success', 'code' => $code, 'messages' => ['All Employees Attendance'], 'data' => $allTeams];
        return response()->json($output, $code);
    }

    public function getByEmpCode(Request $request): \Illuminate\Http\JsonResponse|\Illuminate\Routing\Redirector|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse
    {
        $code = 200;
        $alluserattendance = $this->userAttendance->datatableByEmpCode($request->all());
        $output = ['status' => 'success', 'code' => $code, 'messages' => ['Employee Monthly Attendance'], 'data' => $alluserattendance];
            return response()->json($output, $code);

    }

    function correctDate($str): string
    {
        $date = explode('-',$str);
        if($str){
            return $date[2].'-'.$date[1].'-'.$date[0];
        } else{
            return 'NULL';
        }
    }

    public function add(Request $request): \Illuminate\Http\JsonResponse|\Illuminate\Routing\Redirector|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse
    {
        $file = $request->file('file');
        $userArr = $this->csvToArray($file);
        $code = 200;
        if($userArr){
            foreach ($userArr as $empCode => $dates) {
                $empCode = ltrim($empCode, '0');
                \DB::table('user_attendances')->where('emp_code',$empCode)->WhereMonth('attendance_date',$request->month)->WhereYear('attendance_date',$request->year)->delete();
                $attendanceData=[];
                foreach($dates as $date=>$columns){
                    $data['emp_code'] = $empCode;
                    $data['attendance_date'] = $this->correctDate(str_replace('/','-',$columns[3]));
                    $data['shift_code'] = $columns[4];
                    $data['actual_date_in'] = $this->correctDate(str_replace('/','-',$columns[5]));
                    $data['actual_time_in'] = !empty($columns[6])?$columns[6]:'0000';
                    $data['actual_time_out'] = !empty($columns[7])?$columns[7]:'0000';
                    $data['actual_day_out'] = $this->correctDate(str_replace('/','-',$columns[8]));
                    $data['ot_hours_system_calculated'] = $columns[9];
                    $data['ot_hours_approved'] = $columns[10];
                    $data['attendance_status'] = $columns[11];
                    array_push($attendanceData,$data);

                }
                \DB::table('user_attendances')->insert($attendanceData);
            }
            $output = ['status' => 'success', 'code' => $code, 'messages' => ['User Attendance added successfully.'],'data'=>null];
        } else{
            $output = ['status' => 'error', 'code' => 419, 'messages' => ['Something went wrong.'],'data'=>null];
        }

        if($request->isForm){
            return redirect('attendance')->with('success', 'User Attendance added successfully.');
        } else{
            return response()->json($output, $code);
        }
    }

    function csvToArray($filename = '', $delimiter = ',')
    {
        if (!file_exists($filename) || !is_readable($filename))
            return false;

        $header = null;
        $data = array();
        if (($handle = fopen($filename, 'r')) !== false)
        {
            while (($row = fgetcsv($handle, 1000, $delimiter)) !== false)
            {
                if (!$header)
                    $header = $row;
                else
                    //$data[$row[0]][$row[3]] = array_combine($header, $row);
                    $data[$row[0]][$row[3]] = $row;
            }
            fclose($handle);
        }

        return $data;
    }

}
