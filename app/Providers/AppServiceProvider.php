<?php

namespace App\Providers;

use Validator;



use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend(
            'current_password',
            function ($attribute, $value, $parameters, $validator) {



                if (!empty(Auth::guard('web')->user()->id)) {

                    $password = Auth::guard('web')->user()->password;
                }

                return \Illuminate\Support\Facades\Hash::check($value, $password);
            }
        );
    }
}
