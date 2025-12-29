<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\BranchController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\ItemController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->Route('admin.login');
});



Route::get('/admin/login', [AdminController::class, 'login'])->name('admin.login');

Route::middleware(['auth', 'verified','role:admin'])->prefix('admin')->name('admin.')->group(function () {

    
    Route::get('/dashboard',[AdminController::class,'index'])->name('dashboard');
    //User Routes
    Route::get('/userIndex',[UserController::class,'create'])->name('userIndex');
    Route::post('/UserCreate',[UserController::class,'store'])->name('userCreate');
    Route::get('/allusers',[UserController::class,'index'])->name('allUsers');
    Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('userDelete');
    Route::get('/edit/{id}',[UserController::class,'edit'])->name('editUser');
    Route::put('/update/{id}',[UserController::class,'update'])->name('updateUser');
   
   //Branch Routes
    Route::get('/branch',[BranchController::class,'create'])->name('addBranch');
    Route::post('/saveBranch',[BranchController::class,'store'])->name('savebranch');
    Route::get('/allbranches',[BranchController::class,'index'])->name('allbranch');
    Route::delete('/branch/{id}',[BranchController::class,'destroy'])->name('deletebranch');
    Route::get('/branchedit/{id}',[BranchController::class,'edit'])->name('editbranch');
   //category Routes
    Route::put('/updatebranch/{id}',[BranchController::class,'update'])->name('updatebranch');
    Route::get('/category',[CategoryController::class,'create'])->name('addcategory');
    Route::post('/saveCategory',[CategoryController::class,'store'])->name('savecategory');
    Route::get('/allcategory',[CategoryController::class,'index'])->name('allcategory');
    Route::delete('/category/{id}',[CategoryController::class,'destroy'])->name('deletecategory');
    Route::get('/categoryedit/{id}',[CategoryController::class,'edit'])->name('editcategory');
    Route::put('/updatecategory/{id}',[CategoryController::class,'update'])->name('updatecategory');
    Route::get('/category',[CategoryController::class,'create'])->name('addcategory');
    //item Routes
    Route::get('/item',[ItemController::class,'create'])->name('additem');
    Route::post('/storeitem',[ItemController::class,'store'])->name('saveitem');
    Route::get('/allitem',[ItemController::class,'index'])->name('allitem');
    Route::get('/detail/{id}',[ItemController::class,'detail'])->name('detail');
    Route::get('/edititem/{id}',[ItemController::class,'edit'])->name('edititem');
    Route::put('/updateitem/{id}',[ItemController::class,'update'])->name('updateitem');
    Route::delete('/itemremove/{id}',[ItemController::class,'destroy'])->name('deleteitem');

    Route::get('/issue/{id}',[ItemController::class,'issue'])->name('issue');
    


});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
