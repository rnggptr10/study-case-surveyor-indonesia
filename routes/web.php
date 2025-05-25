<?php

use App\Http\Controllers\AdminSurveyController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserSurveyController;
use App\Http\Middleware\ManualAuth;
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login',[AuthController::class, 'showLogin'])->name('login');
Route::post('/login',[AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(ManualAuth::class)->group(function () {
    // Routes User
    Route::middleware(RoleMiddleware::class.':user')->group(function () {
        //// Dashboard
        Route::get('/user/dashboard',[UserSurveyController::class, 'index'])->name('user.dashboard');
        // Survey
        // Route::get('/user-surveys', [UserSurveyController::class, 'index'])->name('user.surveys');
        Route::get('/user-surveys/{assignedSurvey}/fill', [UserSurveyController::class, 'fill'])->name('user.surveys.fill');
        Route::post('/my-surveys/{assignedSurvey}/submit', [UserSurveyController::class, 'submit'])->name('user.surveys.submit');
        Route::get('/survey/result/{id}', [UserSurveyController::class, 'result'])->name('user.survey.result');
    });

    // Routes Admin
    Route::middleware(RoleMiddleware::class.':admin')->group(function () {
        // Dashboard
        Route::get('/admin/dashboard', [AdminSurveyController::class, 'index'])->name('admin.dashboard');
        // Users
        Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users.index');
        Route::get('/admin/users/create', [UserController::class, 'create'])->name('admin.users.create');
        Route::post('/admin/users', [UserController::class, 'store'])->name('admin.users.store');
        Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
        Route::put('/users/{user}', [UserController::class, 'update'])->name('admin.users.update');
        Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');
        // Survey
        Route::get('/admin/survey', [AdminSurveyController::class, 'index'])->name('admin.survey.index');
        Route::get('/admin/assign-surveys', [AdminSurveyController::class, 'indexAssignSurvey'])->name('admin.survey.assign.index');
        Route::post('/admin/assign-surveys', [AdminSurveyController::class, 'assign'])->name('admin.survey.assign.store');

    });
});

