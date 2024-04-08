<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ReportController;
use App\Http\Controllers\Api\DashboardController;
use App\Http\Controllers\Api\TimesheetController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::get('/user-info', function (Request $request) {
    return $request->user();
  })->middleware('auth:sanctum');
    
  Route::group(['prefix' => 'auth'], function () {
      Route::post('login', [AuthController::class, 'login']);
      Route::post('register', [AuthController::class, 'register']);
  
      Route::group(['middleware' => 'auth:sanctum'], function() {
        Route::get('logout', [AuthController::class, 'logout']);
        Route::get('user-profile', [AuthController::class, 'user']);
        Route::post('profile-update', [AuthController::class, 'profileUpdate']);
        Route::post('forget-password', [AuthController::class, 'forgetPassword']);
      });
  });

  Route::get('Dropdown-List', [DashboardController::class, 'dropdown_list']);
  Route::post('employee-List', [DashboardController::class, 'employee_cost']);

    Route::group(['middleware' => 'auth:sanctum'], function() {

        Route::get('user-dashboard', [ReportController::class, 'viewdashboard']);

        Route::get('assignment-map/list', [DashboardController::class, 'assignment_map_list']);
        
        Route::get('assignment-map/step-one', [DashboardController::class, 'assignment_map_step_one']);
        Route::post('assignment-map/step-one', [DashboardController::class, 'assignment_map_submit_step_one']);

        Route::get('assignment-map/step-two', [DashboardController::class, 'assignment_map_step_two']);
        Route::get('assignment-map/assign_map_emp', [DashboardController::class, 'assign_map_emp']);
        Route::post('assignment-map/step-two', [DashboardController::class, 'assignment_map_submit_step_two']);

        Route::get('assignment-map/step-three/{assignment_map_id}', [DashboardController::class, 'assignment_map_step_three']);
        Route::post('assignment-map/step-three', [DashboardController::class, 'assignment_map_submit_step_three']);

        Route::get('/client-list/{id?}',[DashboardController::class, 'clientlist']);
        Route::post('/add-client',[DashboardController::class, 'addclient']);
        Route::get('/delete-client/{id}',[DashboardController::class, 'deleteclient']);

        Route::get('/assignment-list/{id?}',[DashboardController::class, 'assignmentlist']);
        Route::post('/add-assignment',[DashboardController::class, 'addassignment']);
        Route::get('/delete-assignment/{id}',[DashboardController::class, 'deleteassignment']);

        Route::get('timesheet/list', [TimesheetController::class, 'timesheetlist']);
        Route::get('/edit-timesheet/{id}',[TimesheetController::class, 'edittimesheetview']);
        Route::post('/edit-timesheet/{id}',[TimesheetController::class, 'edittimesheetsubmit']);
    
    });

