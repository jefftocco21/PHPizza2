<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use Illuminate\Support\Facades\File;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    return view('posts', [
        'posts' => post::all()
    ]);
});

//wildcard is put in brackets, matched and passed to function
Route::get('posts/{post}', function($slug) { 
    //Find a post by its slug and pass it to a view called "post"

    return view('post', [
        'post' => Post::findorFail($slug)
    ]);
}); //->where('post', '[A-z_\-]+'); //404 would be thrown if URI does not match regular expression
