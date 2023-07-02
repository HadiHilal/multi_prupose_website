<?php


use Illuminate\Support\Facades\Route;


  Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin' , 'verified'])->group(function () {
      Route::prefix('testimonials')->name('testimonials.')->group(function () {
            Route::get('index', 'AdminController@index')->name('index')->can('view testimonials');
            Route::get('create', 'AdminController@create')->name('create')->can('add testimonials');
            Route::post('store', 'AdminController@store')->name('store')->can('add testimonials');
            Route::get('edit/{id}', 'AdminController@edit')->name('edit')->can('edit testimonials');
            Route::post('update', 'AdminController@update')->name('update')->can('edit testimonials');
            Route::get('delete/{id}', 'AdminController@destroy')->name('delete')->can('delete testimonials');
    });
});
