<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SettingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here are the admin panel routes. Authentication is handled via the auth
| middleware and admin access is enforced via the admin middleware.
|
*/

// Public admin auth routes — admin.guest redirects already-authenticated admins to dashboard
Route::middleware('admin.guest')->group(function () {
    Route::get('/admin/login', [AuthController::class, 'showLogin'])->name('admin.login');
    Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login.post');
});

// Protected admin routes
Route::prefix('admin/')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('categories', CategoryController::class)->except(['show']);
    Route::resource('projects', ProjectController::class)->except(['show']);
    Route::resource('services', ServiceController::class)->except(['show']);
    Route::resource('posts', PostController::class)->except(['show']);
    Route::resource('messages', MessageController::class)->only(['index', 'show', 'destroy']);

    // Settings: single form to edit all, POST to update
    Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
    Route::put('settings', [SettingController::class, 'update'])->name('settings.update');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});
