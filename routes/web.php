<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;



Route::get('/', [IdeaController::class, 'index'])->name('idea.index');
Route::get('/ideas/{idea:slug}', [IdeaController::class, 'show'])->name('idea.show');

// Route::get('/', [HomeController::class, 'home'])->name('home.index');
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/@{user:username}', [UserController::class, 'show'])->name('users.show');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {
    Route::get('/publish', [PostController::class, 'create'])->name('posts.create');
    Route::get('/create', [IdeaController::class, 'create'])->name('idea.create');
    Route::get('/ideas/{idea:slug}/edit', [IdeaController::class, 'edit'])->name('idea.edit');
    Route::group(['middleware' => ['admin'], 'prefix' => 'admin'], function () {
        Route::get('/categories/create', [CategoryController::class, 'create'])->name('admin.categories.create');
    });

});
