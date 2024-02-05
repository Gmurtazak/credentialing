<?php

namespace App\Http\Controllers\Api\v1\Schedule;

use App\Dto\ScheduleData;
use App\Http\Controllers\Controller;
use App\Services\Schedule\ScheduleService;
use Auth;
use Illuminate\Http\Request;
use App\Support\Dto\ListViewData;


class ScheduleController extends Controller
{
    public function __construct(public ScheduleService $schedule)
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
        $allFiles = $this->schedule->datatable(ListViewData::fromRequest($request));
        $output = ['status' => 'success', 'code' => $code, 'messages' => ['All files'], 'data' => $allFiles];
        return response()->json($output, $code);
    }

    /**
     * @param AddFileRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public function add(Request $request): \Illuminate\Http\JsonResponse|\Illuminate\Routing\Redirector|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse
    {
        $request->merge([
            "working_days" => implode(",", $request->working_days)
        ]);
        $code = 200;
        $this->schedule->create(ScheduleData::fromRequest($request));
        $output = ['status' => 'success', 'code' => $code, 'messages' => ['Schedule added successfully.'],'data'=>null];
        if($request->isForm){
            return redirect('viewschedule')->with('success', 'Schedule added successfully.');
        } else{
            return response()->json($output, $code);
        }
    }


}
