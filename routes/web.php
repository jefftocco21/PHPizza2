<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\Category;
Use App\Models\User;
Use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\PostCommentController;
use PhpParser\Node\Stmt\TryCatch;

//health check
Route::get('ping', function (){

    $mailchimp = new \MailchimpMarketing\ApiClient();

    $mailchimp->setConfig([
        'apiKey' => config('services.mailchimp.key'),
        'server' => 'us20'
    ]);

    $response = $mailchimp->ping->get();
    print_r($response);
});


Route::get('lists', function (){

    $mailchimp = new \MailchimpMarketing\ApiClient();

    $mailchimp->setConfig([
        'apiKey' => config('services.mailchimp.key'),
        'server' => 'us20'
    ]);
    $response = $mailchimp->lists->getListMembersInfo('da73eda747');
    ddd($response);
});

Route::post('newsletter', function(){
    request()->validate(['email' => 'required|email']);

    $mailchimp = new \MailchimpMarketing\ApiClient();

    $mailchimp->setConfig([
        'apiKey' => config('services.mailchimp.key'),
        'server' => 'us20'
    ]);

    try {
        $response = $mailchimp->lists->addListMember('da73eda747', [
            'email_address' => request('email'),
            'status' => 'subscribed',
            'status_if_new' => 'subscribed'
        ]);
    } catch (\Exception $e){
        return redirect('/')
                ->with('success', 'You are now signed up for our newsletter.');
    }
});


Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('posts/{post:slug}', [PostController::class, 'show']);
Route::post('posts/{post:slug}/comments', [PostCommentController::class, 'store']);

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionController::class, 'create'])->middleware('guest'); //only guests should see a login page
Route::post('logout', [SessionController::class, 'destroy'])->middleware('auth'); //user must be authenticated to reach logout

Route::post('sessions', [SessionController::class, 'store'])->middleware('guest'); //only guests should have to try to login by reaching SessionController
