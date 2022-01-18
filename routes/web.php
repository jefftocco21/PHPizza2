<?php

use App\Http\Controllers\NewsletterController;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\Category;
Use App\Models\User;
Use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\PostCommentController;
use App\Services\Newsletter;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Validation\ValidationException;

//health check
Route::post('newsletter', NewsletterController::class);

Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('posts/{post:slug}', [PostController::class, 'show']);
Route::post('posts/{post:slug}/comments', [PostCommentController::class, 'store']);

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionController::class, 'create'])->middleware('guest'); //only guests should see a login page
Route::post('logout', [SessionController::class, 'destroy'])->middleware('auth'); //user must be authenticated to reach logout

Route::post('sessions', [SessionController::class, 'store'])->middleware('guest'); //only guests should have to try to login by reaching SessionController

Route::get('admin/posts/create', [PostController::class, 'create'])->middleware('admin');
Route::post('admin/posts', [PostController::class, 'store'])->middleware('admin');
