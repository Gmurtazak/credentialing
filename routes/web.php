<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// optimize Artisan Command
Route::get('/clear', function () {
    Illuminate\Support\Facades\Artisan::call('cache:clear');
    Illuminate\Support\Facades\Artisan::call('config:clear');
    Illuminate\Support\Facades\Artisan::call('view:clear');
    Illuminate\Support\Facades\Artisan::call('route:clear');
    Illuminate\Support\Facades\Artisan::call('config:cache');
    Illuminate\Support\Facades\Artisan::call('optimize:clear');
    dd("optimization Done ");
});
//cron job url for update project sales to status 0
Route::group(['prefix'=>'cron'], function() {
    Route::get('/project-sale-cancel', [\App\Http\Controllers\Api\v1\ProjectSale\ProjectSaleController::class, 'resetStatus']);
});


//UI Links
Route::group(['prefix'=>'ui'],function() {
    Route::get('/insurance', function () {
        return view('ui.insurance');
    });
    Route::get('/charts', function () {
        return view('ui.charts');
    });
    Route::get('/target', function () {
        return view('ui.target');
    });
    Route::get('/users', function () {
        return view('ui.users');
    });
    Route::get('/addUsers', function () {
        return view('ui.add-user');
    });
    Route::get('/viewAccounts', function () {
        return view('ui.view-account');
    });
    Route::get('/addAccounts', function () {
        return view('ui.add-account');
    });
    Route::get('/workAssignmentDataTeam', function () {
        return view('ui.work-assignment-data-team');
    });
    Route::get('/workAssignmentList', function () {
        return view('ui.workassignment.list');
    });
    Route::get('/adHocAssignment', function () {
        return view('ui.workassignment.adHoc-assignment');
    });
    Route::get('/workAssignmentQc', function () {
        return view('ui.workassignment.work-assignment-qc');
    });
    Route::get('/listWorkAssignQc', function () {
        return view('ui.workassignment.list-work-assigned-qc');
    });
    Route::get('/teams', function () {
        return view('ui.team');
    });
    Route::get('/department', function () {
        return view('ui.department');
    });
    Route::get('/entities', function () {
        return view('ui.entities');
    });
    Route::get('/categories', function () {
        return view('ui.categories');
    });
    Route::get('/roles', function () {
        return view('ui.roles');
    });
    Route::get('/viewError', function () {
        return view('ui.view-error');
    });
    Route::get('/viewSchedule', function () {
        return view('ui.view-schedule');
    });
    Route::get('/addSchedule', function () {
        return view('ui.add-schedule');
    });
    Route::get('/attendance', function () {
        return view('ui.attendance');
    });
    Route::get('/productivityListAdmin', function () {
        return view('ui.productivity-list-admin');
    });
    Route::get('/productivityList', function () {
        return view('ui.productivity-list');
    });
    Route::get('/productivityExecutive', function () {
        return view('ui.productivity-executive');
    });
    Route::get('/productivitySummary', function () {
        return view('ui.productivity-summary');
    });
    Route::get('/clientWise', function () {
        return view('ui.client-wise');
    });
});

Route::get('/', function () {
    return redirect('/login');
});
Route::get('/plogin', [App\Http\Controllers\ProviderController::class, 'index'])->name('plogin');

Route::get('/useractivation/{key}', [App\Http\Controllers\UserController::class, 'verifyUser'])->name('user.verification');
Route::post('/useractivationupdate', [App\Http\Controllers\UserController::class, 'activateUser'])->name('user.activate');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('get/{filename}', [App\Http\Controllers\SaleController::class, 'getfile'])->name('download.view');


//Inner Pages
Route::group(['middleware' => ['auth']], function() {
    /**
     * Teams Routes
     */
    Route::group(['prefix'=>'teams'],function() {
        Route::get('/', [App\Http\Controllers\TeamsController::class, 'index'])->name('teams');
    });

    /**
     * Team Targets Routes
     */
    Route::group(['prefix'=>'teamtargets'],function() {
        Route::get('/', [App\Http\Controllers\TeamTargetsController::class, 'index'])->name('teamtargets');
    });

    /**
     * Team Targets Routes
     */
    Route::group(['prefix'=>'monthlyreports'],function() {
        Route::get('/', [App\Http\Controllers\MonthlyReportController::class, 'index'])->name('monthlyreports');
    });

    /**
     * Portal Targets Routes
     */
    Route::group(['prefix'=>'portaltargets'],function() {
        Route::get('/', [App\Http\Controllers\PortalTargetsController::class, 'index'])->name('portaltargets');
    });

    /**
     * Department Routes
     */
    Route::group(['prefix'=>'departments'],function() {
        Route::get('/', [App\Http\Controllers\DepartmentController::class, 'index'])->name('departments');
    });

    /**
     * Categories Routes
     */
    Route::group(['prefix'=>'categories'],function() {
        Route::get('/', [App\Http\Controllers\CategoryController::class, 'index'])->name('category');
    });
    /**
     * entities Routes
     */
    Route::group(['prefix'=>'account'],function() {
        Route::get('/', [App\Http\Controllers\AccountController::class, 'index'])->name('account');
    });

    /**
     * entities Routes
     */
    Route::group(['prefix'=>'saleaccount'],function() {
        Route::get('/', [App\Http\Controllers\SaleAccountController::class, 'index'])->name('saleaccount');
    });
    Route::group(['prefix'=>'saleportal'],function() {
        Route::get('/', [App\Http\Controllers\SalePortalController::class, 'index'])->name('saleportal');
    });

    /**
     * role Routes
     */
    Route::group(['prefix'=>'roles'],function() {
        Route::get('/', [App\Http\Controllers\RoleController::class, 'index'])->name('role');
    });

    /**
     * role Routes
     */
    Route::group(['prefix'=>'rolesrights'],function() {
        Route::get('/', [App\Http\Controllers\RoleRightController::class, 'index'])->name('rolesrights');
    });
    Route::group(['prefix'=>'sale'],function() {
        Route::get('/', [App\Http\Controllers\SaleController::class, 'saleproject'])->name('sale');
        Route::get('/add', [App\Http\Controllers\SaleController::class, 'add_sale'])->name('sale.add');
        Route::get('/edit/{id}', [App\Http\Controllers\SaleController::class, 'edit_sale'])->name('sale.edit');
        Route::post('/save', [App\Http\Controllers\SaleController::class, 'save'])->name('sale-save');


    });
    Route::group(['prefix'=>'bidinghistory'],function() {
        Route::get('/log/{id}', [App\Http\Controllers\SaleController::class, 'bidinghistory'])->name('sale.log');
    });

    Route::group(['prefix'=>'portal'],function() {
        Route::get('/', [App\Http\Controllers\SaleController::class, 'index'])->name('portal');
        Route::get('/{id}', [App\Http\Controllers\SaleController::class, 'view'])->name('portal.view');
        //Route::get('/{downloadid}', [App\Http\Controllers\SaleController::class, 'download'])->name('download.view');

    });
    /**
     * file Routes
     */
    Route::group(['prefix'=>'file'],function() {
        Route::get('/', [App\Http\Controllers\FileController::class, 'index'])->name('file');
        Route::get('/autocomplete', [App\Http\Controllers\FileController::class, 'autocomplete'])->name('file.autocomplete');
        Route::get('/getfile/{id}', [App\Http\Controllers\FileController::class, 'getfile'])->name('file.getfile');

    });
    /**
     * Project Routes
     */
    Route::group(['prefix'=>'project'],function() {
        Route::get('/', [App\Http\Controllers\ProjectController::class, 'index'])->name('project');
    });
    /**
     * businesstypes Routes
     */
    Route::group(['prefix'=>'businesstypes'],function() {
        Route::get('/', [App\Http\Controllers\BusinesstypesController::class, 'index'])->name('businesstypes');
    });
    /**
     * insurance Routes
     */
    Route::group(['prefix'=>'insurance'],function() {
        Route::get('/', [App\Http\Controllers\InsuranceController::class, 'index'])->name('insurance');
    });

    /**
     * client Routes
     */
    Route::group(['prefix'=>'client'],function() {
        Route::get('/', [App\Http\Controllers\ClientController::class, 'index'])->name('client');
        Route::get('/{id}', [App\Http\Controllers\ClientController::class, 'view'])->name('client.view');
        Route::get('/autocomplete', [App\Http\Controllers\ClientController::class, 'autoComplete'])->name('client.autocomplete');
        Route::get('/getclient/{id}', [App\Http\Controllers\ClientController::class, 'getClient'])->name('client.getclient');
    });

    /**
     * projecttype Routes
     */
    Route::group(['prefix'=>'projecttype'],function() {
        Route::get('/', [App\Http\Controllers\ProjectTypeController::class, 'index'])->name('projecttype');
    });

    /**
     * User Routes
     */
    Route::group(['prefix'=>'user'],function() {
        Route::get('/', [App\Http\Controllers\UserController::class, 'index'])->name('user');
        Route::get('/add', [App\Http\Controllers\UserController::class, 'add'])->name('user.add');
        Route::post('updateuser', [\App\Http\Controllers\Api\v1\User\UserController::class, 'update'])->name('user-update');
        Route::get('/edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
    });

    /**
     * Account Benchmark Routes
     */
    Route::group(['prefix'=>'accountbenchmark'],function() {
        Route::get('/', [App\Http\Controllers\AccountBenchmarkController::class, 'index'])->name('accountbenchmark');
        Route::get('/add', [App\Http\Controllers\AccountBenchmarkController::class, 'add'])->name('accountbenchmark.add');
        Route::post('updateaccountbenchmark', [\App\Http\Controllers\Api\v1\AccountAndBenchmark\AccountAndBenchmarkController::class, 'update'])->name('accountbenchmark-update');
        Route::get('/edit/{id}', [App\Http\Controllers\AccountBenchmarkController::class, 'edit'])->name('accountbenchmark.edit');
    });

    /**
     * Work Assignment Routes
     */
    Route::group(['prefix'=>'workassginment'],function() {
        Route::get('/', [App\Http\Controllers\WorkAssignmentController::class, 'index'])->name('workassignment');
        Route::get('/add', [App\Http\Controllers\WorkAssignmentController::class, 'add'])->name('workassignment.add');
        Route::post('/temp-submit', [App\Http\Controllers\WorkAssignmentController::class, 'tempSubmit'])->name('workassignment-temp-submit');

        Route::get('/submitted', [App\Http\Controllers\WorkAssignmentController::class, 'submitted'])->name('workassignmentsubmit');
        Route::get('/submitted-ad', [App\Http\Controllers\WorkAssignmentController::class, 'submitted_ad'])->name('workassignmentsubmitad');

    });

    /**
     * Data Team Executive Routes
     */
    Route::group(['prefix'=>'assignedassignmentteam'],function() {
        Route::get('/', [App\Http\Controllers\AssignedAssignmentteamController::class, 'index'])->name('assignedassignmentteam');
        Route::post('updateworkassignmentteam', [\App\Http\Controllers\Api\v1\AdHocAssignment\AdHocAssignmentController::class, 'update'])->name('workassignmentteam-update');
    });

    Route::group(['prefix'=>'workassignmentteam'],function() {
        Route::get('/', [App\Http\Controllers\WorkassignmentteamController::class, 'index'])->name('workassignmentteam');
        Route::get('/add', [App\Http\Controllers\WorkassignmentteamController::class, 'index'])->name('workassignmentteam.add');
    });

    Route::group(['prefix'=>'workassignmentqc'],function() {
        Route::get('/', [App\Http\Controllers\WorkassignmentqcController::class, 'index'])->name('workassignmentqc');
    });
    Route::group(['prefix'=>'viewerrorlistwork'],function() {
        Route::get('/', [App\Http\Controllers\ListworkassignedController::class, 'viewerror'])->name('viewerrorlistwork');
    });
    Route::group(['prefix'=>'schedule'],function() {
        Route::get('/', [App\Http\Controllers\ScheduleController::class, 'index'])->name('schedule');
        Route::get('/add', [App\Http\Controllers\ScheduleController::class, 'add'])->name('schedule.add');
    });
    Route::group(['prefix'=>'quality'],function() {
        Route::get('/', [App\Http\Controllers\QualityController::class, 'index'])->name('quality');
    });

    Route::group(['prefix'=>'quality-executive'],function() {
        Route::get('/', [App\Http\Controllers\QualityController::class, 'indexexecutive'])->name('quality-executive');
    });
    Route::group(['prefix'=>'quality-errorwtg'],function() {
        Route::get('/', [App\Http\Controllers\QualityController::class, 'indexerrorwtg'])->name('quality-errorwtg');
    });
    Route::group(['prefix'=>'quality-errorsummary'],function() {
        Route::get('/', [App\Http\Controllers\QualityController::class, 'indexerrorsummary'])->name('quality-errorsummary');
    });
    Route::group(['prefix'=>'quality-errorreversal'],function() {
        Route::get('/', [App\Http\Controllers\QualityController::class, 'indexerrorreversal'])->name('quality-errorreversal');
    });

    Route::group(['prefix'=>'productivity'],function() {
        Route::get('/', [App\Http\Controllers\ProductivityController::class, 'index'])->name('productivity');
        Route::get('/search', [App\Http\Controllers\ProductivityController::class, 'getByEmpCode'])->name('productivity-search');

    });

    Route::group(['prefix'=>'productivity-summary'],function() {
        Route::get('/', [App\Http\Controllers\ProductivityController::class, 'indexsummary'])->name('productivity-summary');
    });
    Route::group(['prefix'=>'productivity-executive'],function() {
        Route::get('/', [App\Http\Controllers\ProductivityController::class, 'indexexecutive'])->name('productivity-executive');
    });

    Route::group(['prefix'=>'attendance'],function() {
        Route::get('/', [App\Http\Controllers\AttendanceController::class, 'index'])->name('attendance');
        Route::post('saveattendance', [\App\Http\Controllers\Api\v1\UserAttendance\UserAttendanceController::class, 'add'])->name('attendance-save');
        Route::get('/add', [App\Http\Controllers\AttendanceController::class, 'add'])->name('attendance.add');
        Route::get('/search', [App\Http\Controllers\AttendanceController::class, 'getByEmpCode'])->name('attendance-search');
    });

    Route::group(['prefix'=>'listworkassigned'],function() {
        Route::get('/', [App\Http\Controllers\ListworkassignedController::class, 'index'])->name('listworkassigned');
        Route::get('/edit/{work_assignment_id}', [App\Http\Controllers\ListworkassignedController::class, 'edit'])->name('listworkassigned.edit');
        Route::get('/add/{work_assignment_id}', [App\Http\Controllers\ListworkassignedController::class, 'add'])->name('listworkassigned.add');
        Route::get('/viewerror/{work_assignment_id}', [App\Http\Controllers\ListworkassignedController::class, 'indexs'])->name('listworkassigned.viewerror');
         });



    Route::get('/logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('site.logout');
});
Route::post('savelistworkassigned', [\App\Http\Controllers\Api\v1\WorkAssignmentError\WorkAssignmentErrorController::class, 'add'])->name('listworkassigned-save');
Route::post('saveschedule', [\App\Http\Controllers\Api\v1\Schedule\ScheduleController::class, 'add'])->name('schedule-save');

//testing Route
//Route::get('/test', [App\Http\Controllers\TestController::class, 'test'])->name('test');
Route::post('saveroleright', [\App\Http\Controllers\Api\v1\Role\RoleController::class, 'addRoleRigts'])->name('roleright-save');
//Route::post('savearoleright', function (Request $request){
//    return($request->all());
//});
//Department
Route::post('savedepartment', [\App\Http\Controllers\Api\v1\Department\DepartmentController::class, 'add'])->name('department-save');
Route::post('updatedepartment', [\App\Http\Controllers\Api\v1\Department\DepartmentController::class, 'update'])->name('department-update');
Route::post('saveworkassignmentlog', [\App\Http\Controllers\Api\v1\WorkAssignmentLog\WorkAssignmentLogController::class, 'add'])->name('workassignmentlog-save');
Route::post('updateworkassignment', [\App\Http\Controllers\Api\v1\WorkAssignment\WorkAssignmentController::class, 'update'])->name('workassignment-update');
Route::post('saveuser', [\App\Http\Controllers\Api\v1\User\UserController::class, 'add'])->name('user-save');
Route::post('updateprojectsale', [\App\Http\Controllers\Api\v1\ProjectSale\ProjectSaleController::class, 'update'])->name('projectsale-update');
Route::post('updateteamtargets', [\App\Http\Controllers\Api\v1\TeamTargets\TeamTargetsController::class, 'update'])->name('teamtargets-update');
Route::post('saveinsurance', [\App\Http\Controllers\Api\v1\Portal\PortalController::class, 'add'])->name('insurance-save');
Route::post('savecredentialing', [\App\Http\Controllers\Api\v1\Insurance\InsuranceController::class, 'add'])->name('credentialing-save');
Route::post('updatecredentialing', [\App\Http\Controllers\Api\v1\Insurance\InsuranceController::class, 'update'])->name('credentialing-update');
Route::middleware([\App\Http\Middleware\ApiRequest::class])->group(function(){
    Route::post('test/save', [App\Http\Controllers\TestController::class, 'save'])->name('test-save');
    Route::post('saveteam', [App\Http\Controllers\TeamsController::class, 'save'])->name('team-save');
    Route::post('saveteamtargets', [App\Http\Controllers\TeamTargetsController::class, 'save'])->name('teamtargets-save');
    Route::post('save', [App\Http\Controllers\PortalTargetsController::class, 'save'])->name('portaltargets-save');
    Route::post('saverole', [App\Http\Controllers\RoleController::class, 'save'])->name('role-save');
    Route::post('saveentity', [App\Http\Controllers\EntityController::class, 'save'])->name('entity-save');
    Route::post('saveaccount', [App\Http\Controllers\AccountController::class, 'save'])->name('account-save');



    Route::post('saveprojectsale', [App\Http\Controllers\SaleController::class, 'save'])->name('projectsale-save');
    Route::post('savecategory', [App\Http\Controllers\CategoryController::class, 'save'])->name('category-save');
    Route::post('savefile', [App\Http\Controllers\FileController::class, 'save'])->name('file-save');
    Route::post('saveproject', [App\Http\Controllers\ProjectController::class, 'save'])->name('project-save');
    Route::post('savebusiness', [App\Http\Controllers\BusinesstypesController::class, 'save'])->name('business-save');
    Route::post('saveproject', [App\Http\Controllers\ProjectController::class, 'save'])->name('project-save');
    Route::post('saveaccountbenchmark', [App\Http\Controllers\AccountBenchmarkController::class, 'save'])->name('accountbenchmark-save');
    Route::post('saveclient', [App\Http\Controllers\ClientController::class, 'save'])->name('client-save');
    Route::post('saveworkassignment', [App\Http\Controllers\WorkAssignmentController::class, 'save'])->name('workassignment-save');
    Route::post('saveworkassignmentteam', [App\Http\Controllers\WorkassignmentteamController::class, 'save'])->name('workassignmentteam-save');
// client

    //Route::post('saveclient', [\App\Http\Controllers\Api\v1\Client\ClientController::class, 'add'])->name('client-save');
    Route::post('updateclient', [\App\Http\Controllers\Api\v1\Client\ClientController::class, 'update'])->name('client-update');

    // Insurance
    //Route::post('saveinsurance', [App\Http\Controllers\BusinesstypesController::class, 'save'])->name('insurance-save');
      Route::post('updateinsurance', [\App\Http\Controllers\Api\v1\Insurance\InsuranceController::class, 'update'])->name('insurance-update');
});
