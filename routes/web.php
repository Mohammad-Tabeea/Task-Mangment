<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\SubTaskController;
use App\Http\Controllers\TeamLeaderController;
Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['adminauth'])->prefix('admin')->group(function () {
    Route::get('/welcomRegisterAdmin', [AdminController::class, 'welcomRegisterAdmin'])->name('welcomRegisterAdmin');
    Route::get('ShowAddTask', [TaskController::class, 'ShowAddTask'])->name('ShowAddTask');
    Route::get('viewGetUser', [AdminController::class, 'viewGetUser'])->name('viewGetUser');
    Route::get('/welcomeAdmin', [AdminController::class, 'welcomeAdmin'])->name('welcomeAdmin');


});
Route::middleware(['role'])->prefix('teamLeader')->group(function () {
    Route::get('ShowAddSubTask', [SubTaskController::class, 'ShowAddSubTask'])->name('ShowAddSubTask');
    Route::get('showMytask', [TaskController::class, 'showMytask'])->name('showMytask');
    Route::get('WelcomTeamLeader', [Usercontroller::class, 'WelcomeTeamLeader'])->name('WelcomTeamLeader');

});
Route::middleware(['rolememmber'])->prefix('memmber')->group(function () {
    Route::get('welcomeMemmber', [Usercontroller::class, 'welcomeMemmber'])->name('welcomeMemmber');

});

Route::prefix('task')->group(function () {
    Route::post('AddTask', [TaskController::class, 'Add_Task'])->name('AddTask');
    Route::get('showTask', [TaskController::class, 'showTask'])->name('showTask');
    Route::get('detalstak/{taskId}', [TaskController::class, 'detalstak'])->name('detalstak');
    Route::delete('deleteTask/{taskId}', [TaskController::class, 'deleteTask'])->name('deleteTask');

});


Route::prefix('subTask')->group(function () {
    Route::post('AddSubTask', [SubTaskController::class, 'AddSubTask'])->name('AddSubTask');
    Route::get('showsubtask', [SubTaskController::class, 'showsubtask'])->name('showsubtask');
    Route::get('DetailsSub/{subtask}', [SubTaskController::class, 'DetailsSub'])->name('DetailsSub');
    Route::delete('deleteSubTask/{subtask}', [SubTaskController::class, 'deleteSubTask'])->name('deleteSubTask');

});
Route::prefix('team')->group(function () {
    Route::get('myteam', [TeamLeaderController::class, 'myteam'])->name('myteam');
    Route::post('AddTeam', [TeamController::class, 'AddTeam'])->name('AddTeam');
    Route::get('viewgetteam', [TeamController::class, 'viewgetteam'])->name('viewgetteam');
    Route::get('showTeamsWithUsers', [TeamController::class, 'showTeamsWithUsers'])->name('showTeamsWithUsers');
    Route::post('MemmberTeam/{team_id}', [TeamController::class, 'MemmberTeam'])->name('MemmberTeam');
    Route::delete('deleteTeam/{teamId}', [TeamController::class, 'deleteTeam'])->name('deleteTeam');
    Route::get('viewAddTeam', [TeamController::class, 'viewAddTeam'])->name('viewAddTeam');

});
Route::prefix('auth')->group(function () {
    Route::post('login', [UserController::class, 'login'])->name('login');
    Route::get('/ViewLogin', [UserController::class, 'ViewLogin'])->name('viewlogin');
    Route::get('ViewRegister', [UserController::class, 'ViewRegister'])->name('viewregister');
    Route::post('registeruser', [UserController::class, 'registeruser'])->name('registeruser');
    Route::get('/ViewRegisterAdmin', [AdminController::class, 'ViewRegisterAdmin'])->name('ViewRegisterAdmin');
    Route::post('registerAdmin', [AdminController::class, 'registerAdmin'])->name('registerAdmin');
    Route::post('loginAdmin', [AdminController::class, 'loginAdmin'])->name('loginAdmin');
    Route::get('ViewLoginAdmin', [AdminController::class, 'ViewLoginAdmin'])->name('ViewLoginAdmin');

});
Route::prefix('user')->group(function () {
    Route::post('/update-role/{userId}', [RoleController::class, 'updateRole'])->name('updateRole');
    Route::get('getnullteam/{teamId}', [UserController::class, 'getnullteam'])->name('getnullteam');
    Route::post('updateUserTeam', [Usercontroller::class, 'updateUserTeam'])->name('updateUserTeam');
    Route::delete('deleteUser/{userId}', [Usercontroller::class, 'deleteUser'])->name('deleteUser');
    Route::post('deleteuserFromTeam/{userId}', [Usercontroller::class, 'deleteuserFromTeam'])->name('deleteuserFromTeam');
    Route::get('AddMemmberToTeam/{team_id}', [UserController::class, 'AddMemmberToTeam'])->name('AddMemmberToTeam');
});



// Route::get('getuser',[AdminController::class ,'getuser'])->name('getuser');


