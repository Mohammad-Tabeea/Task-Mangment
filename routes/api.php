<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CompanyContoller;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\priorityController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\SubTaskController;
use App\Http\Controllers\RoleController;
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('registeruser', [UserController::class,'registeruser']); 
Route::get('login',         [UserController::class,'login']); 
Route::post('AddCompany',   [CompanyContoller::class,'AddCompany']);
Route::get('getusers',      [UserController::class,'getusers']); 
Route::post('registerAdmin',[AdminController::class,'registerAdmin']); 
Route::post('AddTeam',      [TeamController::class,'AddTeam']); 
Route::post('Addstatus',    [StatusController::class,'Addstatus']); 
Route::post('Addpriority',  [priorityController::class,'Addpriority']); 
Route::post('AddTask',      [TaskController::class,'AddTask']); 
Route::post('AddSubTask',   [SubTaskController::class,'AddSubTask']); 
Route::post('AddRole',      [RoleController::class,'AddRole']); 