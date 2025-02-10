<?php

use App\Http\Controllers\Admin\MasterController;
use App\Http\Controllers\Employee\PptcController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Employee\ApprovalController;
use App\Http\Controllers\Employee\BudgetController;
use App\Http\Controllers\Employee\DashboardController as EmployeeDashboardController;
use App\Http\Controllers\Employee\LoginControlller;
use App\Http\Controllers\Employee\RequestcapexController;
use App\Http\Controllers\LayoutController;
use App\Models\Menu;
use Illuminate\Support\Facades\Route;

Route::get('/', [LoginControlller::class, 'index']);
Route::post('login/auth', [LoginControlller::class, 'auth'])->name('login.auth');
Route::post('reload-captach', [LoginControlller::class, 'reloadCaptach']);

//start employee routes

Route::middleware(['employee_auth'])->group(function () {
  //  Route::prefix('employee')->middleware(['employee_auth'])->group(function () {
  $menus = Menu::all()->where('menu_for', 'Employee')->whereNotNull('controller');
  foreach ($menus as $list) {
    $controller = "App\Http\Controllers\Employee\\" . $list['controller'];
    Route::get($list['route'], [$controller, $list['method']]);
  }

     /** Asset Type Master */
     Route::post('getdatabudgetentity', [BudgetController::class, 'getdataabudgetEntity']);
     Route::post('budgetentity/status', [BudgetController::class, 'budgetStatus']);
     Route::post('budgetentity/addedit', [BudgetController::class, 'budgetEntityAddEdit']);
     Route::post('assettypedrp', [BudgetController::class, 'assettypedrpView']);
     Route::post('businessdivdrp', [BudgetController::class, 'businessdivdrpView']);
     Route::post('budgetentityaddeditajax', [BudgetController::class, 'budgetEntityAddEditAction']);
     Route::post('budgetallocation/addedit', [BudgetController::class, 'budgetallocationAddEdit']);
     Route::post('budgetallocationaddeditajax', [BudgetController::class, 'budgetAllocationAddEditAction']);

     Route::post('capexrequestaddeditajax', [RequestcapexController::class, 'capexRequestAddEditAction']);
     Route::post('searchvendorbyname', [RequestcapexController::class, 'vendorSearchByName']);
     Route::post('requestdetailsmodel', [RequestcapexController::class, 'getRequestDetailsModel']);

     Route::post('approvaldetailsmodel', [RequestcapexController::class, 'getApprovalDetailsModel']);

    Route::get('logout', [LoginControlller::class, 'logout'])->name('employee.logout');

 
  
});

//start admin routes

Route::post('admin/auth', [UserController::class, 'auth'])->name('admin.auth');
Route::post('admin/reload-captach', [UserController::class, 'reloadCaptach']);

Route::prefix('admin')->middleware(['admin_auth'])->group(function () {

  $menus = Menu::all()->where('menu_for', 'Admin')->whereNotNull('controller');
  foreach ($menus as $list) {
    $controller = "App\Http\Controllers\Admin\\" . $list['controller'];
    Route::get($list['route'], [$controller, $list['method']]);
  }

   /** Asset Type Master */
   Route::post('assettype/getdata', [MasterController::class, 'getdataassetstype']);
   Route::post('assettype/status', [MasterController::class, 'assetsTypeStatus']);
  Route::post('assettype/addedit', [MasterController::class, 'assetsTypeAddEdit']);
  Route::post('assettypeaddeditajax', [MasterController::class, 'assettypeAddEditAction']);
  Route::post('departmentexcelajax', [MasterController::class, 'departmentExcel']);

  /** Business Division Master */
  Route::post('businessdivision/getdata', [MasterController::class, 'getbusinessdivision']);
  Route::post('businessdivision/status', [MasterController::class, 'businessdivisionStatus']);
  Route::post('businessdivision/addedit', [MasterController::class, 'businessdivisionAddEdit']);
  Route::post('businessdivisionajax', [MasterController::class, 'businessdivisionAddEditAction']);

    /** Approver Master */
    Route::post('approver/getdata', [MasterController::class, 'getApprover']);
    Route::post('approver/addedit', [MasterController::class, 'ApproverAddEdit']);
    Route::post('approverajax', [MasterController::class, 'approverAddEditAction']);
  

  Route::post('log/{table}/{rowid}', [LayoutController::class, 'logActivity']);

  Route::get('logout', [UserController::class, 'logout'])->name('admin.logout');


});

Route::get('admin', [UserController::class, 'index']);

// Route::get('dashboardtest', [DashboardController::class, 'index']);
