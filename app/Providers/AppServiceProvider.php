<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('adminpimda', function () {
            return Auth::user()->role == 'adminpimda';
        });

        Gate::define('admincabang', function () {
            return Auth::user()->role == 'admincabang' && Auth::user()->status == true;
        });

        if (env('APP_ENV') !== 'local') {
            URL::forceScheme('https');
        }
    }
}
