<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\Category;
Use App\Models\User;
Use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;

Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('posts/{post:slug}', [PostController::class, 'show']);

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');
Route::post('logout', [SessionController::class, 'destroy']);
