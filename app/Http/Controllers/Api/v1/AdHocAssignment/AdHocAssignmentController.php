<?php

namespace App\Http\Controllers\Api\v1\AdHocAssignment;

use App\Dto\AdHocAssignmentData;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdHocAssignment\AddAdHocAssignmentRequest;
use App\Http\Requests\AdHocAssignment\EditAdHocAssignmentRequest;
use App\Http\Requests\AdHocAssignment\GetAddHocAssignmentDetailRequest;
use App\Services\AdHocAssignment\AdHocAssignmentService;
use App\Services\EmailService;
use Auth;
use Illuminate\Http\Request;
use App\Support\Dto\ListViewData;


class AdHocAssignmentController extends Controller
{
    public function __construct(public AdHocAssignmentService $adHocAssignment, public EmailService $email)
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
        $allAdHocAssignment = $this->adHocAssignment->datatable(ListViewData::fromRequest($request));
        $output = ['status' => 'success', 'code' => $code, 'messages' => ['All Ad Hoc Assignments'], 'data' => $allAdHocAssignment];
        return response()->json($output, $code);
    }

    /**
     * @param AddAdHocAssignmentRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public function add(AddAdHocAssignmentRequest $request): \Illuminate\Http\JsonResponse
    {
        $code = 200;
        $adHocAssignment = $this->adHocAssignment->create(AdHocAssignmentData::fromRequest($request));
        //dd($adHocAssignment->createdBy()->first(),$adHocAssignment->createdBy()->first()->report()->first());
        //$createdByReportTo = $adHocAssignment->createdBy()->first()->report()->first();
        // send email to created by report to
        //$mailData['toEmail'] = $createdByReportTo->email;
        //$mailData['toName'] = $createdByReportTo->name;
        //$mailData['link'] = route('user.verification',['key'=>base64_encode($createdByReportTo->id)]);
        //$mailData['subject'] = 'New Ad Hoc Assignment';
        //$this->email->newUserSignup($mailData);

        $output = ['status' => 'success', 'code' => $code, 'messages' => ['Ad Hoc Assignment added successfully.'],'data'=>null];
        return response()->json($output, $code);
    }

    /**
     * @param GetAddHocAssignmentDetailRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getDetail(GetAddHocAssignmentDetailRequest $request): \Illuminate\Http\JsonResponse
    {
        $code = 200;
        $adHocAssignment   = $this->adHocAssignment->find((int) $request->get('id'));
        $output = ['status' => 'success', 'code' => $code, 'messages' => ['Ad Hoc Assignment Detail'], 'data' => $adHocAssignment];
        return response()->json($output, $code);
    }

    /**
     * @param EditAdHocAssignmentRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    //public function update(EditAdHocAssignmentRequest $request): \Illuminate\Http\JsonResponse
    public function update(Request $request): \Illuminate\Http\JsonResponse|\Illuminate\Routing\Redirector|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse
    {
        $code = 200;
        $adHocAssignment = $this->adHocAssignment->find((int) $request->get('id'));
        if($adHocAssignment !== NULL){
            $adHocAssignmentData = AdHocAssignmentData::fromModel($adHocAssignment)->toRequest($request);
            $this->adHocAssignment->update($adHocAssignmentData);
            $output = ['status' => 'success', 'code' => $code, 'messages' => ['Ad Hoc Assignment data updated successfully.'],'data'=>$adHocAssignmentData];
        } else{
            $code = 404;
            $output = ['status' => 'error', 'code' => $code, 'messages' => ['Ad Hoc Assignment not found.'],'data'=>null];
        }

        if($request->isForm){
            return redirect('workassignmentteam')->with('success', 'Ad Hoc Assignment data updated successfully.');
        } else{
            return response()->json($output, $code);
        }

    }
}
