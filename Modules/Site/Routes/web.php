<?php


use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


Route::group(['prefix' => LaravelLocalization::setLocale() , 'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]],  function()
{
    Route::get('/' , 'SiteController@index')->name('index');
    Route::get('/services' , 'SiteController@services')->name('services');
      Route::get('/services/{slug}' , 'SiteController@show_services')->name('services.show');
});

