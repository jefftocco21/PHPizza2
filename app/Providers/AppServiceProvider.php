<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Services\Newsletter;
use Illuminate\Pagination\Paginator;
use MailchimpMarketing\ApiClient;
use Illuminate\Support\Facades\Blade;
Use App\Models\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        app()->bind(Newsletter::class, function(){

            $client = (new ApiClient)->setConfig([
                'apiKey' => config('services.mailchimp.key'),
                'server' => 'us20'
            ]);

            return new Newsletter($client);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useTailwind();

        //gate lets some people in, others are left at gate
        //if currently signed in user satisfies logic
        Gate::define('admin', function(User $user){
            return $user->username === 'super';
        });

        //Custom blade directive called admin that defers to Gate admin
        Blade::if('admin', function(){
            return request()->user()->can('admin');
        });
    }
}
