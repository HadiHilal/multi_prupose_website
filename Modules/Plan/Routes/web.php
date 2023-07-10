<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


Route::group(['prefix' => LaravelLocalization::setLocale() , 'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]],  function()
{
    Route::get('pricing' , 'FrontendController@index')->name('pricing');
    require  __DIR__ . '/admin.php';
});
