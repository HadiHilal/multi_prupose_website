<?php

namespace App\Providers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Modules\Settings\Entities\Seo;
use Modules\Settings\Entities\Settings;

class AppServiceProvider extends ServiceProvider
{
    public $settings;
    public $seo;


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
        if($this->app->environment('production')) {
            \URL::forceScheme('https');
        }

         $settings = Cache::get('settings');
        if (!$settings){
            $settings   = Settings::all()->pluck('value' , 'key');
            Cache::put('settings' , $settings);
        }

        $seo = Cache::get('seo');
        if (!$seo){
            $seo   = Seo::all()->pluck('value' , 'key');;
            Cache::put('seo' , $seo);
        }


        $this->settings  = $settings;
        $this->seo   = $seo;

        view()->composer('layouts.app', function($view) {
            $view->with([
                'settings' =>  $this->settings ,
                'seo' =>  $this->seo ,

            ]);
        });
    }
}
