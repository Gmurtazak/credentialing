<?php

use App\Http\Controllers\Api\v1\ProjectSale\ProjectSaleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/
//Reports download
Route::group(['prefix'=>'v1'],function() {
    Route::group(['prefix'=>'sale'],function() {
        Route::get('export', [\App\Http\Controllers\Api\v1\ProjectSale\ProjectSaleController::class, 'export'])->name('fileExport');
        Route::get('export-non-sale', [\App\Http\Controllers\Api\v1\ProjectSale\ProjectSaleController::class, 'exportNonSale'])->name('export-non-sale');
    });
});

Route::post('provider/{id}', [App\Http\Controllers\ClientController::class, 'views'])->name('client.views');
Route::group(['prefix'=>'v1','middleware'=>'auth.token'],function(){
    Route::group(['prefix'=>'user'],function(){
        Route::post('authenticate', [\App\Http\Controllers\Api\v1\User\UserController::class, 'authenticate']);
        Route::post('register', [\App\Http\Controllers\Api\v1\User\UserController::class, 'add']);
        Route::get('forgot-password', [\App\Http\Controllers\Api\v1\User\UserController::class, 'forgotPassword']);
        Route::post('reset-password', [\App\Http\Controllers\Api\v1\User\UserController::class, 'resetPassword']);
        Route::post('login', [\App\Http\Controllers\Api\v1\User\UserController::class, 'login']);

        Route::get('all', [\App\Http\Controllers\Api\v1\User\UserController::class, 'all']);
        Route::get('table/list', [\App\Http\Controllers\Api\v1\User\UserController::class, 'tableList']);
        Route::post('detail', [\App\Http\Controllers\Api\v1\User\UserController::class, 'getDetail']);
        Route::post('update', [\App\Http\Controllers\Api\v1\User\UserController::class, 'update']);
    });

    //Category
    Route::group(['prefix'=>'category'],function(){
        Route::get('all', [\App\Http\Controllers\Api\v1\Category\CategoryController::class, 'all']);
        Route::post('add', [\App\Http\Controllers\Api\v1\Category\CategoryController::class, 'add']);
        Route::post('detail', [\App\Http\Controllers\Api\v1\Category\CategoryController::class, 'getDetail']);
        Route::post('update', [\App\Http\Controllers\Api\v1\Category\CategoryController::class, 'update']);
    });

    //Department
    Route::group(['prefix'=>'department'],function(){
        Route::get('all', [\App\Http\Controllers\Api\v1\Department\DepartmentController::class, 'all']);
        Route::post('add', [\App\Http\Controllers\Api\v1\Department\DepartmentController::class, 'add']);
        Route::post('detail', [\App\Http\Controllers\Api\v1\Department\DepartmentController::class, 'getDetail']);
        Route::get('getcurrentbids', [\App\Http\Controllers\Api\v1\Department\DepartmentController::class, 'getcurrentbids']);
        Route::post('update', [\App\Http\Controllers\Api\v1\Department\DepartmentController::class, 'update']);
    });

    //Team
    Route::group(['prefix'=>'team'],function(){
        Route::get('all', [\App\Http\Controllers\Api\v1\Team\TeamController::class, 'all']);
        Route::post('add', [\App\Http\Controllers\Api\v1\Team\TeamController::class, 'add']);
        Route::post('detail', [\App\Http\Controllers\Api\v1\Team\TeamController::class, 'getDetail']);
        Route::post('update', [\App\Http\Controllers\Api\v1\Team\TeamController::class, 'update']);
    });

    //TeamTargets
    Route::group(['prefix'=>'teamtargets'],function(){
        Route::get('all', [\App\Http\Controllers\Api\v1\TeamTargets\TeamTargetsController::class, 'all']);
        Route::post('add', [\App\Http\Controllers\Api\v1\TeamTargets\TeamTargetsController::class, 'add']);
        Route::post('detail', [\App\Http\Controllers\Api\v1\TeamTargets\TeamTargetsController::class, 'getDetail']);
        Route::get('allmonthyteamtarge', [\App\Http\Controllers\Api\v1\TeamTargets\TeamTargetsController::class, 'allmonthyteamtarget']);
        Route::post('sortmonthyteamtarget', [\App\Http\Controllers\Api\v1\TeamTargets\TeamTargetsController::class, 'sortmonthyteamtarget']);
        Route::post('sortmonthyteam', [\App\Http\Controllers\Api\v1\TeamTargets\TeamTargetsController::class, 'sortmonthyteam']);
        Route::get('allyeartarge', [\App\Http\Controllers\Api\v1\TeamTargets\TeamTargetsController::class, 'allyeartarge']);
        Route::post('update', [\App\Http\Controllers\Api\v1\TeamTargets\TeamTargetsController::class, 'update']);
    });

    //TeamTargets
    Route::group(['prefix'=>'portaltargets'],function(){
        Route::get('all', [\App\Http\Controllers\Api\v1\PortalTargets\PortalTargetsController::class, 'all']);
        Route::post('add', [\App\Http\Controllers\Api\v1\PortalTargets\PortalTargetsController::class, 'add']);
        Route::post('detail', [\App\Http\Controllers\Api\v1\PortalTargets\PortalTargetsController::class, 'getDetail']);
        Route::post('update', [\App\Http\Controllers\Api\v1\PortalTargets\PortalTargetsController::class, 'update']);
    });

    //Entity
    Route::group(['prefix'=>'entity'],function(){
        Route::get('all', [\App\Http\Controllers\Api\v1\Entity\EntityController::class, 'all']);
        Route::post('add', [\App\Http\Controllers\Api\v1\Entity\EntityController::class, 'add']);
        Route::post('detail', [\App\Http\Controllers\Api\v1\Entity\EntityController::class, 'getDetail']);
        Route::post('update', [\App\Http\Controllers\Api\v1\Entity\EntityController::class, 'update']);

    });

    //role
    Route::group(['prefix'=>'role'],function(){
        Route::get('all', [\App\Http\Controllers\Api\v1\Role\RoleController::class, 'all']);
        Route::post('addrole', [\App\Http\Controllers\Api\v1\Role\RoleController::class, 'addRoleRigts']);
        Route::post('add', [\App\Http\Controllers\Api\v1\Role\RoleController::class, 'add']);
        Route::post('detail', [\App\Http\Controllers\Api\v1\Role\RoleController::class, 'getDetail']);
        Route::post('update', [\App\Http\Controllers\Api\v1\Role\RoleController::class, 'update']);
        Route::get('getall', [\App\Http\Controllers\Api\v1\Role\RoleController::class, 'getAll']);
    });

    //file
    Route::group(['prefix'=>'file'],function(){
        Route::get('all', [\App\Http\Controllers\Api\v1\File\FileController::class, 'all']);
        Route::post('add', [\App\Http\Controllers\Api\v1\File\FileController::class, 'add']);
        Route::post('detail', [\App\Http\Controllers\Api\v1\File\FileController::class, 'getDetail']);
        Route::post('update', [\App\Http\Controllers\Api\v1\File\FileController::class, 'update']);
    });

    //project
    Route::group(['prefix'=>'project'],function(){
        Route::get('all', [\App\Http\Controllers\Api\v1\Project\ProjectController::class, 'all']);
        Route::post('add', [\App\Http\Controllers\Api\v1\Project\ProjectController::class, 'add']);
        Route::post('detail', [\App\Http\Controllers\Api\v1\Project\ProjectController::class, 'getDetail']);
        Route::post('update', [\App\Http\Controllers\Api\v1\Project\ProjectController::class, 'update']);
    });

    //business_type
    Route::group(['prefix'=>'business_type'],function(){
        Route::get('all', [\App\Http\Controllers\Api\v1\BusinessType\BusinessTypeController::class, 'all']);
        Route::post('add', [\App\Http\Controllers\Api\v1\BusinessType\BusinessTypeController::class, 'add']);
        Route::post('detail', [\App\Http\Controllers\Api\v1\BusinessType\BusinessTypeController::class, 'getDetail']);
        Route::post('update', [\App\Http\Controllers\Api\v1\BusinessType\BusinessTypeController::class, 'update']);
    });


    //Insurance
    Route::group(['prefix'=>'insurance'],function(){
        Route::get('all', [\App\Http\Controllers\Api\v1\Insurance\InsuranceController::class, 'all'])->name('api.insurance.all');
        Route::post('add', [\App\Http\Controllers\Api\v1\Insurance\InsuranceController::class, 'add']);
        Route::post('detail', [\App\Http\Controllers\Api\v1\Insurance\InsuranceController::class, 'getDetail']);
        Route::post('update', [\App\Http\Controllers\Api\v1\Insurance\InsuranceController::class, 'update']);
    });


    //Client
    Route::group(['prefix'=>'client'],function(){
        Route::get('all', [\App\Http\Controllers\Api\v1\Client\ClientController::class, 'all']);
        Route::post('add', [\App\Http\Controllers\Api\v1\Client\ClientController::class, 'add']);
        Route::post('detail', [\App\Http\Controllers\Api\v1\Client\ClientController::class, 'getDetail']);
        Route::post('update', [\App\Http\Controllers\Api\v1\Client\ClientController::class, 'update']);
    });

    //Project Type
    Route::group(['prefix'=>'project_type'],function(){
        Route::get('all', [\App\Http\Controllers\Api\v1\ProjectType\ProjectTypeController::class, 'all']);
        Route::post('add', [\App\Http\Controllers\Api\v1\ProjectType\ProjectTypeController::class, 'add']);
        Route::post('detail', [\App\Http\Controllers\Api\v1\ProjectType\ProjectTypeController::class, 'getDetail']);
        Route::post('update', [\App\Http\Controllers\Api\v1\ProjectType\ProjectTypeController::class, 'update']);
        Route::get('databyid', [\App\Http\Controllers\Api\v1\ProjectType\ProjectTypeController::class, 'getAllByProjectType']);
    });

    //Project Type
    Route::group(['prefix'=>'account'],function(){
        Route::get('all', [\App\Http\Controllers\Api\v1\Account\AccountController::class, 'all']);
        Route::post('add', [\App\Http\Controllers\Api\v1\Account\AccountController::class, 'add']);
        Route::post('detail', [\App\Http\Controllers\Api\v1\Account\AccountController::class, 'getDetail']);
        Route::post('update', [\App\Http\Controllers\Api\v1\Account\AccountController::class, 'update']);
        Route::get('getaccountsale', [\App\Http\Controllers\Api\v1\Account\AccountController::class, 'getaccountsale']);
    });

    //Work Assignment Temp
    Route::group(['prefix'=>'work_assignment_temp'],function(){
        Route::get('all', [\App\Http\Controllers\Api\v1\WorkAssignmentTemp\WorkAssignmentTempController::class, 'all']);
        Route::post('add', [\App\Http\Controllers\Api\v1\WorkAssignmentTemp\WorkAssignmentTempController::class, 'add']);
        Route::post('detail', [\App\Http\Controllers\Api\v1\WorkAssignmentTemp\WorkAssignmentTempController::class, 'getDetail']);
        Route::post('update', [\App\Http\Controllers\Api\v1\WorkAssignmentTemp\WorkAssignmentTempController::class, 'update']);
    });

    //Work Assignment
    Route::group(['prefix'=>'work_assignment'],function(){
        Route::get('all', [\App\Http\Controllers\Api\v1\WorkAssignment\WorkAssignmentController::class, 'all']);
        Route::get('all-submitted', [\App\Http\Controllers\Api\v1\WorkAssignment\WorkAssignmentController::class, 'allSubmitted']);
        Route::post('add', [\App\Http\Controllers\Api\v1\WorkAssignment\WorkAssignmentController::class, 'add']);
        Route::post('detail', [\App\Http\Controllers\Api\v1\WorkAssignment\WorkAssignmentController::class, 'getDetail']);
        Route::post('update', [\App\Http\Controllers\Api\v1\WorkAssignment\WorkAssignmentController::class, 'update']);
        Route::post('temp-submit', [\App\Http\Controllers\Api\v1\WorkAssignment\WorkAssignmentController::class, 'tempSubmit']);
        Route::post('import', [\App\Http\Controllers\Api\v1\WorkAssignment\WorkAssignmentController::class, 'import']);
    });

    //Work Assignment Assigned QC
    Route::group(['prefix'=>'work_assignment_assigned_qc'],function(){
        Route::post('add', [\App\Http\Controllers\Api\v1\WorkAssignmentAssignedQc\WorkAssignmentAssignedQcController::class, 'add'])->name('workassignmentqc-save');
        Route::get('all-submitted', [\App\Http\Controllers\Api\v1\WorkAssignmentAssignedQc\WorkAssignmentAssignedQcController::class, 'all']);
    });

    //Work Assignment Error
    Route::group(['prefix'=>'work_assignment_error'],function(){
        Route::post('add', [\App\Http\Controllers\Api\v1\WorkAssignmentError\WorkAssignmentErrorController::class, 'add'])->name('workassignmenterror-save');
        Route::get('all', [\App\Http\Controllers\Api\v1\WorkAssignmentError\WorkAssignmentErrorController::class, 'all']);
        Route::get('getbyworkassignment', [\App\Http\Controllers\Api\v1\WorkAssignmentError\WorkAssignmentErrorController::class, 'getbyworkassignment']);
    });

    // Ad Hoc Assignment
    Route::group(['prefix'=>'ad_hoc_assignment'],function(){
        Route::get('all', [\App\Http\Controllers\Api\v1\AdHocAssignment\AdHocAssignmentController::class, 'all']);
        Route::post('add', [\App\Http\Controllers\Api\v1\AdHocAssignment\AdHocAssignmentController::class, 'add']);
        Route::post('detail', [\App\Http\Controllers\Api\v1\AdHocAssignment\AdHocAssignmentController::class, 'getDetail']);
        Route::post('update', [\App\Http\Controllers\Api\v1\AdHocAssignment\AdHocAssignmentController::class, 'update']);
    });

    //Work Assignment Log
    Route::group(['prefix'=>'work_assignment_log'],function(){
        Route::get('all', [\App\Http\Controllers\Api\v1\WorkAssignmentLog\WorkAssignmentLogController::class, 'all']);
        Route::post('add', [\App\Http\Controllers\Api\v1\WorkAssignmentLog\WorkAssignmentLogController::class, 'add']);
        Route::post('detail', [\App\Http\Controllers\Api\v1\WorkAssignmentLog\WorkAssignmentLogController::class, 'getDetailByWorkAssignmentId']);
    });

    //Productivity Listing
    Route::group(['prefix'=>'productivity'],function(){
        Route::get('all', [\App\Http\Controllers\Api\v1\productivity\ProductivityController::class, 'all']);
        Route::get('byUserId', [\App\Http\Controllers\Api\v1\productivity\ProductivityController::class, 'byUserId']);
    });

    //Schedule
    Route::group(['prefix'=>'schedule'],function(){
        Route::get('all', [\App\Http\Controllers\Api\v1\Schedule\ScheduleController::class, 'all']);
        Route::post('add', [\App\Http\Controllers\Api\v1\Schedule\ScheduleController::class, 'add']);
    });

    //User Attendance
    Route::group(['prefix'=>'user_attendance'],function(){
        Route::get('all', [\App\Http\Controllers\Api\v1\UserAttendance\UserAttendanceController::class, 'all']);
        Route::get('getByEmpCode', [\App\Http\Controllers\Api\v1\UserAttendance\UserAttendanceController::class, 'getByEmpCode']);
        Route::post('add', [\App\Http\Controllers\Api\v1\UserAttendance\UserAttendanceController::class, 'add']);
    });

    //Quality Listing
    Route::group(['prefix'=>'quality'],function(){
        Route::get('all', [\App\Http\Controllers\Api\v1\quality\QualityController::class, 'all']);
    });


    //Portal
    Route::group(['prefix'=>'portal'],function(){
        Route::get('all', [\App\Http\Controllers\Api\v1\Portal\PortalController::class, 'all']);
        Route::post('add', [\App\Http\Controllers\Api\v1\Portal\PortalController::class, 'add']);
        Route::post('detail', [\App\Http\Controllers\Api\v1\Portal\PortalController::class, 'getDetail']);
        Route::post('update', [\App\Http\Controllers\Api\v1\Portal\PortalController::class, 'update']);
        Route::get('getportalsale', [\App\Http\Controllers\Api\v1\Portal\PortalController::class, 'getportalsale']);

    });

    //Project Sale
    Route::group(['prefix'=>'project_sale'],function(){
        Route::get('all', [\App\Http\Controllers\Api\v1\ProjectSale\ProjectSaleController::class, 'all']);
        Route::post('add', [\App\Http\Controllers\Api\v1\ProjectSale\ProjectSaleController::class, 'add']);
        Route::post('detail', [\App\Http\Controllers\Api\v1\ProjectSale\ProjectSaleController::class, 'getDetail']);
        Route::post('sortgettopfive', [\App\Http\Controllers\Api\v1\ProjectSale\ProjectSaleController::class, 'sortgettopfive']);
        Route::get('topfive', [\App\Http\Controllers\Api\v1\ProjectSale\ProjectSaleController::class, 'gettopfive']);
        Route::get('currentsale', [\App\Http\Controllers\Api\v1\ProjectSale\ProjectSaleController::class, 'getcurrentsale']);
        Route::get('lastsale', [\App\Http\Controllers\Api\v1\ProjectSale\ProjectSaleController::class, 'getlastsale']);
        Route::post('update', [\App\Http\Controllers\Api\v1\ProjectSale\ProjectSaleController::class, 'update']);
        Route::post('update_relations', [\App\Http\Controllers\Api\v1\ProjectSale\ProjectSaleController::class, 'update']);

    });

    Route::group(['prefix'=>'project_sale_log'],function(){
        Route::get('/',[ProjectSaleController::class,'getProjectSaleLog']);
    });
});

