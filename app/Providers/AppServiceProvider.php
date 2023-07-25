<?php

namespace App\Providers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Modules\Settings\Entities\Seo;
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
    public function boot()
    {
        Paginator::useBootstrap();

        if ($this->app->environment('production')) {
            \URL::forceScheme('https');
        }

        $settings = Cache::get('settings');
        if (!$settings) {
            $settings = Settings::all()->pluck('value', 'key');
            Cache::put('settings', $settings);
        }

        $seo = Cache::get('seo');
        if (!$seo) {
            $seo = Seo::all()->pluck('value', 'key');
            Cache::put('seo', $seo);
        }

        view()->composer('layouts.app', function ($view) use ($settings, $seo) {
            $view->with([
                'settings' => $settings,
                'seo' => $seo,
            ]);
        });
    }
}
