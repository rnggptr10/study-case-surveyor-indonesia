<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
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
        Route::get('/user/dashboard', fn() => view('user.dashboard.index'));

    });

    // Routes Admin
    Route::middleware(RoleMiddleware::class.':admin')->group(function () {
        // Dashboard
        Route::get('/admin/dashboard', fn() => view('admin.dashboard.index'));
        // Users
        Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users.index');
        Route::get('/admin/users/create', [UserController::class, 'create'])->name('admin.users.create');
        Route::post('/admin/users', [UserController::class, 'store'])->name('admin.users.store');
        Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
        Route::put('/users/{user}', [UserController::class, 'update'])->name('admin.users.update');
        Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');
        // Survey
        
    });
});

