<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\LogoutController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\WelcomeController;


/*
|--------------------------------------------------------------------------
| Redirect
|--------------------------------------------------------------------------
*/


// Admin login
Route::get('/admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::get('/Welcom', [WelcomeController::class, 'index'])->name('welcome.page');

// Dashboard (all roles)
Route::middleware(['auth', 'verified'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    });

// ADMIN ONLY
Route::middleware(['auth', 'verified', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        // Users
        Route::get('/userIndex', [UserController::class, 'create'])->name('userIndex');
        Route::post('/UserCreate', [UserController::class, 'store'])->name('userCreate');
        Route::get('/allusers', [UserController::class, 'index'])->name('allUsers');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('editUser');
        Route::put('/update/{id}', [UserController::class, 'update'])->name('updateUser');
        Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('userDelete');
        Route::get('/change-password', [UserController::class, 'change'])->name('change-password');
        Route::post('/change-password', [UserController::class, 'updatepassword'])->name('updatepassword');
        Route::get('/Profile', [UserController::class, 'Profile'])->name('Profile');
        Route::get('/link', [LinkController::class, 'index'])->name('link');
        Route::get('/linklist', [LinkController::class, 'list'])->name('link.list');
        Route::post('/store-link', [LinkController::class, 'store'])->name('store.link');
        Route::get('/edit-link/{id}', [LinkController::class, 'edit'])->name('edit.link');
        Route::post('/update-link/{id}', [LinkController::class, 'update'])->name('update.link');
        Route::delete('/delete-link/{id}', [LinkController::class, 'destroy'])->name('delete.link');

        Route::get('/slider', [SliderController::class, 'index'])->name('slider');
        Route::get('/sliderlist', [SliderController::class, 'list'])->name('slider.list');
        Route::post('/store-slider', [SliderController::class, 'store'])->name('store.slider');
        Route::get('/edit-slider/{id}', [SliderController::class, 'edit'])->name('edit.slider');
        Route::post('/update-slider/{id}', [SliderController::class, 'update'])->name('update.slider');
        Route::delete('/delete-slider/{id}', [SliderController::class, 'destroy'])->name('delete.slider');
     });
// ITEMS (Admin + Superuser + User)

// REPORTS (Admin + Superuser)


// LOGOUT
Route::post('/admin/logout', [LogoutController::class, 'logout'])->middleware('auth')->name('admin.logout');

// PROFILE


require __DIR__.'/auth.php';
