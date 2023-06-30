<?php


use Illuminate\Support\Facades\Route;


  Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin' , 'verified'])->group(function () {
      Route::prefix('testimonials')->name('testimonials.')->group(function () {
            Route::get('index', 'AdminController@index')->name('index')->can('view testimonials');
    });
});
