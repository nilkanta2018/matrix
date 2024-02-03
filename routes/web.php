<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\BlogController; 

  
    
Route::prefix('admin')->group(function () {
    Route::get('login', [AuthController::class, 'index'])->name('login');
    Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');
    Route::get('registration', [AuthController::class, 'registration'])->name('register');
    Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post'); 
});

Route::prefix('admin')->middleware('CheckUser')->group(function () {
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('dashboard', [AuthController::class, 'dashboard'])->name('admin'); 
    Route::get('userList', [AuthController::class, 'userList'])->name('userList');   
    Route::get('blogList', [BlogController::class, 'index'])->name('blogList'); //->middleware(['can:isAdmin'])
    Route::get('add', [BlogController::class, 'create'])->name('create');
    Route::post('saveblog', [BlogController::class, 'saveblog'])->name('saveblog');
    Route::get('delete', [BlogController::class, 'delete'])->name('admin.delete');
    Route::get('edit', [BlogController::class, 'edit'])->name('admin.edit');
    Route::post('update{id}', [BlogController::class, 'update'])->name('blogs.update');
});
