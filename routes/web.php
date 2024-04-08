<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CsvController;
// ADMIN CONTROLLERS
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\dasboardController;
use App\Http\Controllers\Admin\employeeController;
// ADMIN CONTROLLERS
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

Route::get('/', function () {
    return redirect()->route('admin.login');
});

// ADMIN ROUTES
Route::group(['prefix' => 'Admin'], function () {

    // Login
    Route::get('/',[LoginController::class, 'login'])->name('admin.login');
    Route::post('/check-admin',[LoginController::class, 'longincheck']);
    Route::any('/logout-Admin',[LoginController::class, 'logout']);

    //Dashboard
    Route::get('/dasboard',[dasboardController::class, 'view']);
    
    // USERS ROUTE 
    Route::get('/users-list',[dasboardController::class, 'userslist'])->name('Admin.userslist');
    Route::get('/add-users',[dasboardController::class, 'addusersview']);
    Route::post('/add-users',[dasboardController::class, 'addusers']);    
    Route::get('/edit-users',[dasboardController::class, 'editusersview']);
    Route::post('/edit-users/{id}',[dasboardController::class, 'edituser']);

    //employee
    Route::get('/employee-list',[employeeController::class, 'employeelist'])->name('Admin.employeelist');
    Route::get('/getEmpData',[employeeController::class, 'getEmpData'])->name('Admin.getEmpData');
    Route::get('/add-employee',[employeeController::class, 'addemployeeview']);
    Route::post('/add-employee',[employeeController::class, 'addemployee']);    
    Route::get('/edit-employee',[employeeController::class, 'editemployeeview']);
    Route::post('/edit-employee/{id}',[employeeController::class, 'editemployee']);
    Route::get('/delete-employee',[employeeController::class, 'deleteemployee']);

    //client
    Route::get('/client-list',[dasboardController::class, 'clientlist'])->name('Admin.clientlist');
    Route::get('/add-client',[dasboardController::class, 'addclientview']);
    Route::post('/add-client',[dasboardController::class, 'addclient']);    
    Route::get('/edit-client',[dasboardController::class, 'editclientview']);
    Route::post('/edit-client/{id}',[dasboardController::class, 'editclient']);
    Route::get('/delete-client',[dasboardController::class, 'deleteclient']);
    
    //entity
    Route::get('/entity-list',[dasboardController::class, 'entitylist'])->name('Admin.entitylist');
    Route::get('/add-entity',[dasboardController::class, 'addentityview']);
    Route::post('/add-entity',[dasboardController::class, 'addentity']);    
    Route::get('/edit-entity',[dasboardController::class, 'editentityview']);
    Route::post('/edit-entity/{id}',[dasboardController::class, 'editentity']);
    Route::get('/delete-entity',[dasboardController::class, 'deleteentity']);

    //assignment
    Route::get('/assignment-list',[employeeController::class, 'assignmentlist'])->name('Admin.assignmentlist');
    Route::get('/add-assignment',[employeeController::class, 'addassignmentview']);
    Route::post('/add-assignment',[employeeController::class, 'addassignment']);
    Route::get('/edit-assignment',[employeeController::class, 'editassignmentview']);
    Route::post('/edit-assignment/{id}',[employeeController::class, 'editassignment']);
    Route::get('/delete-assignment',[employeeController::class, 'deleteassignment']);
    
    //assignment_map
    Route::get('/assignment_map-list',[employeeController::class, 'assignment_maplist'])->name('Admin.assignment_maplist');
    Route::get('/add-assignment_map',[employeeController::class, 'addassignment_mapview']);
    Route::post('/add-assignment_map',[employeeController::class, 'addassignment_map']);
    Route::get('/edit-assignment_map',[employeeController::class, 'editassignment_mapview']);
    Route::post('/edit-assignment_map/{id}',[employeeController::class, 'editassignment_map']);
    Route::get('/delete-assignment_map',[employeeController::class, 'deleteassignment_map']);

    //Timesheet
    Route::any('/timesheet-list',[dasboardController::class, 'timesheetlist'])->name('Admin.timesheetlist');
    // Route::post('/timesheet-list',[dasboardController::class, 'timesheetlist'])->name('Admin.timesheetlist_get');
    // Route::get('/add-timesheet',[dasboardController::class, 'addtimesheetview']);
    // Route::post('/add-timesheet',[dasboardController::class, 'addtimesheet']);    
    Route::get('/edit-timesheet/{id}',[dasboardController::class, 'edittimesheetview']);
    Route::post('/edit-timesheet/{id}',[dasboardController::class, 'edittimesheet']);
    Route::get('/delete-timesheet',[dasboardController::class, 'deletetimesheet']);

    Route::get('/add-bulk-timesheet',[dasboardController::class, 'addbulktimesheetview']);

});