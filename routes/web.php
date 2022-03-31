<?php

use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\ApplicantController;
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

Route::middleware('can:admin')->group(function(){
    Route::get('admin/posts/create', [AdminPostController::class, 'create']);
    Route::get('admin/posts', [AdminPostController::class, 'index']);
    Route::post('admin/posts', [AdminPostController::class, 'store']);
    Route::get('admin/posts/{post}/edit', [AdminPostController::class, 'edit']);
    Route::patch('admin/posts/{post}', [AdminPostController::class, 'update']);
    Route::delete('admin/posts/{post}', [AdminPostController::class, 'destroy']);
});


