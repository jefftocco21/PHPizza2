<?php

use Illuminate\Support\Facades\Route;

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
    return view('posts');
});

Route::get('posts/{post}', function($slug) { //wildcard is put in brackets, matched and passed to function

    if(! file_exists($path = __DIR__ . "/../resources/posts/{$slug}.html")){
     return redirect('/'); //go to homepage if file does not exist
    }

    //var_dump('file_get_contents'); //would dump the string when the string is no longer stored in cash
    $post = cache()->remember("posts.{$slug}", 5, function() use ($path){ //remember stores key in cache, interval in seconds, then pass function
        return $post = file_get_contents($path);
    });

    return view('post', ['post' => $post]);
})->where('post', '[A-z_\-]+'); //404 would be thrown if URI does not match regular expression
