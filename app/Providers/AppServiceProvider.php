<?php

namespace App\Providers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Modules\Settings\Entities\Settings;

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
        Paginator::useBootstrap();

//
//            \URL::forceScheme('https');



        $settings = Cache::rememberForever('settings', function () {
            return Settings::all()->pluck('value', 'key');
        });



        view()->composer('layouts.app', function ($view) use ($settings) {
            $view->with([
                'settings' => $settings,

            ]);
        });
    }

}
