<?php


use Illuminate\Support\Facades\Route;


  Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin' , 'verified'])->group(function () {
      Route::prefix('settings')->name('settings.')->group(function () {
          Route::get('/' , 'AdminController@index')->name('index')->can('view site settings');
          Route::post('/store' , 'AdminController@store')->name('store')->can('edit site settings');
      });

      Route::prefix('seo')->name('seo.')->group(function () {
          Route::get('/' , 'AdminController@seo_index')->name('index')->can('view site settings');
          Route::post('/store' , 'AdminController@seo_store')->name('store')->can('edit site settings');
      });

});
