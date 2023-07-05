<?php


use Illuminate\Support\Facades\Route;


  Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin' , 'verified'])->group(function () {
      Route::prefix('plans')->name('plans.')->group(function () {
            Route::get('index', 'AdminController@index')->name('index')->can('view plans');
            Route::get('create', 'AdminController@create')->name('create')->can('add plans');
            Route::post('store', 'AdminController@store')->name('store')->can('add plans');
            Route::get('edit/{id}', 'AdminController@edit')->name('edit')->can('edit plans');
            Route::post('update', 'AdminController@update')->name('update')->can('edit plans');
            Route::get('delete/{id}', 'AdminController@destroy')->name('delete')->can('delete plans');
             Route::get('delete_feature/{id}', 'AdminController@delete_feature')->name('delete_feature')->can('delete plans');
    });
});
