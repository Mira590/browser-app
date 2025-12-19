<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->Route('admin.login');
});



Route::get('/admin/login', [AdminController::class, 'login'])->name('admin.login');

Route::middleware(['auth', 'verified','role:admin'])->prefix('admin')->name('admin.')->group(function () {

    Route::get('/dashboard',[AdminController::class,'index'])->name('dashboard');
    Route::get('/userIndex',[UserController::class,'create'])->name('userIndex');
    Route::post('/UserCreate',[UserController::class,'store'])->name('userCreate');
    Route::get('/allusers',[UserController::class,'index'])->name('allUsers');


});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
