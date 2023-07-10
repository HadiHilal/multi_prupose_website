<?php


use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


Route::group(['prefix' => LaravelLocalization::setLocale() , 'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]],  function()
{
    Route::get('/contact', 'FrontendController@index')->name('contact');
    Route::post('/send_message', 'FrontendController@send_message')->name('send_message');

    Route::get('/thank-you' ,'FrontendController@thanks')->name('thanks');

    require  __DIR__ . '/admin.php';
});

