<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\BranchController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\ItemController;
use App\Http\Controllers\admin\ReportController;
use App\Http\Controllers\admin\ItemReportController;
use App\Http\Controllers\admin\LogoutController;
use App\Http\Controllers\admin\ItemVerificationController;

/*
|--------------------------------------------------------------------------
| Redirect
|--------------------------------------------------------------------------
*/
Route::get('/', fn() => redirect()->route('admin.login'));

// Admin login
Route::get('/admin/login', [AdminController::class, 'login'])->name('admin.login');

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

        // Branch
        Route::get('/branch', [BranchController::class, 'create'])->name('addBranch');
        Route::post('/saveBranch', [BranchController::class, 'store'])->name('savebranch');
        Route::get('/allbranches', [BranchController::class, 'index'])->name('allbranch');
        Route::get('/branchedit/{id}', [BranchController::class, 'edit'])->name('editbranch');
        Route::put('/updatebranch/{id}', [BranchController::class, 'update'])->name('updatebranch');
        Route::delete('/branch/{id}', [BranchController::class, 'destroy'])->name('deletebranch');

        // Category
        Route::get('/category', [CategoryController::class, 'create'])->name('addcategory');
        Route::post('/saveCategory', [CategoryController::class, 'store'])->name('savecategory');
        Route::get('/allcategory', [CategoryController::class, 'index'])->name('allcategory');
        Route::get('/categoryedit/{id}', [CategoryController::class, 'edit'])->name('editcategory');
        Route::put('/updatecategory/{id}', [CategoryController::class, 'update'])->name('updatecategory');
        Route::delete('/category/{id}', [CategoryController::class, 'destroy'])->name('deletecategory');

        // Item verification (admin only)
       
    });

// ITEMS (Admin + Superuser + User)
Route::middleware(['auth', 'role:admin,superuser,user'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        // CRUD items
        Route::get('/item', [ItemController::class, 'create'])->name('additem');      // Admin + Superuser
        Route::post('/storeitem', [ItemController::class, 'store'])->name('saveitem'); // Admin + Superuser
        Route::get('/allitem', [ItemController::class, 'index'])->name('allitem');     // All roles
        Route::get('/detail/{id}', [ItemController::class, 'detail'])->name('detail'); // All roles
        Route::get('/edititem/{id}', [ItemController::class, 'edit'])->name('edititem'); // All roles
        Route::put('/updateitem/{id}', [ItemController::class, 'update'])->name('updateitem'); // All roles
        Route::delete('/itemremove/{id}', [ItemController::class, 'destroy'])->name('deleteitem'); // Policy-enforced

        // Issue & Stock
        Route::get('/issue/{id}', [ItemController::class, 'issue'])->name('issue');
        Route::put('/issueitem/{id}', [ItemController::class, 'issued'])->name('issuesave');
        Route::get('/stock', [ItemController::class, 'stock'])->name('stock');
        Route::get('/item/{id}/lifecycle', [ItemController::class, 'lifecycle'])->name('itemlife');

        // item verificion

     Route::get('/items/pending', [ItemVerificationController::class, 'pending'])->name('pending');
        Route::post('/items/{item}/approve', [ItemVerificationController::class, 'approve'])->name('approve');
        Route::post('/items/{item}/reject', [ItemVerificationController::class, 'reject'])->name('reject');
    });

// REPORTS (Admin + Superuser)
Route::middleware(['auth', 'role:admin,superuser'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/report', [ItemReportController::class, 'index'])->name('report');
        Route::get('/items/report', [ItemReportController::class, 'generate'])->name('items.report');
        Route::get('/luck', [ReportController::class, 'create'])->name('spiner');
    });

// LOGOUT
Route::post('/admin/logout', [LogoutController::class, 'logout'])->middleware('auth')->name('admin.logout');

// PROFILE
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
