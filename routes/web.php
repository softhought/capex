<?php

use App\Http\Controllers\Admin\MasterController;
use App\Http\Controllers\Employee\PptcController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Employee\ApprovalController;
use App\Http\Controllers\Employee\DashboardController;
use App\Http\Controllers\Employee\LoginControlller;
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

  Route::post('log/{table}/{rowid}', [LayoutController::class, 'logActivity']);

  Route::get('logout', [UserController::class, 'logout'])->name('admin.logout');


});

Route::get('admin', [UserController::class, 'index']);

Route::get('dashboardtest', [DashboardController::class, 'index']);
