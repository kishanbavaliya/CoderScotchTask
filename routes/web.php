<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmployeeLeaveController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::group(['middleware'=>'auth'], function() {

    Route::get('/', function () {
        return view('dashbord');
    })->name('dashbord');
    Route::group(['middleware'=>'employee-check'], function() {
        Route::get('/leave', [EmployeeLeaveController::class, 'index'])->name('leave.index');
        Route::get('leave/create', [EmployeeLeaveController::class, 'create'])->name('leave.create');
        Route::post('leave/store', [EmployeeLeaveController::class, 'store'])->name('leave.store');
        Route::delete('leave/destroy/{id}', [EmployeeLeaveController::class, 'destroy'])->name('leave.destroy');
    });
    Route::group(['middleware'=>'company-check'], function() {
        Route::get('/employee', [EmployeeController::class, 'index'])->name('employee.index');
        Route::get('/employee/create', [EmployeeController::class, 'create'])->name('employee.create');
        Route::post('/employee/store', [EmployeeController::class, 'store'])->name('employee.store');
        Route::post('/employee/destroy', [EmployeeController::class, 'destroy'])->name('employee.destroy');

        Route::get('employee/leave', [EmployeeLeaveController::class, 'employeeLeaveIndex'])->name('employee-leave.index');
        Route::get('employee/leave/edit/{id}', [EmployeeLeaveController::class, 'employeeLeaveEdit'])->name('employee-leave.edit');
        Route::post('employee/leave/update/{id}', [EmployeeLeaveController::class, 'employeeLeaveUpdate'])->name('employee-leave.update');
    });
});

// User Login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
