<?php


use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


Route::group(['prefix' => LaravelLocalization::setLocale() , 'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]],  function()
{
    Route::get('blogs', 'FrontendController@index')->name('blogs.index');
     Route::get('blogs/{slug}', 'FrontendController@show')->name('blogs.show');
    require  __DIR__ . '/admin.php';
});

