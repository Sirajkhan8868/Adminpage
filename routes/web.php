<?php

use App\Http\Controllers\auth\CategoriesController;
use App\Http\Controllers\Auth\DashboardController;
use App\Http\Controllers\Auth\PostController;
use App\Http\Controllers\auth\TagController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/logout', function () {
    auth()->logout();

});

Auth::routes([
    'register' => false
]);

Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

Route::resource('posts', PostController::class);
Route::get('auth/categories',[CategoriesController::class,'OpenCategoriesPage'])->name('auth.categories');

