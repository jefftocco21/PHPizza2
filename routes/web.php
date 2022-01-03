<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\Category;
Use App\Models\User;
Use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\File;

Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('posts/{post:slug}', [PostController::class, 'show']);

