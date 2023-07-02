<?php


use Illuminate\Support\Facades\Route;


  Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin' , 'verified'])->group(function () {
      Route::prefix('categories')->name('categories.')->group(function () {
          Route::get('/' , 'AdminController@index')->name('index')->can('view categories');
          Route::post('/store' , 'AdminController@store')->name('store')->can('add categories');
          Route::post('/update' , 'AdminController@update')->name('update')->can('edit categories');
          Route::get('/delete/{id}' , 'AdminController@destroy')->name('delete')->can('delete categories');
      });
});
