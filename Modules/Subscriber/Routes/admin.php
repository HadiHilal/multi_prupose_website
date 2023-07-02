<?php


use Illuminate\Support\Facades\Route;


  Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin' , 'verified'])->group(function () {
      Route::prefix('subscribers')->name('subscribers.')->group(function () {
          Route::get('/' , 'AdminController@index')->name('index')->can('view subscribers');
           Route::get('/delete/{id}' , 'AdminController@destroy')->name('delete')->can('delete subscribers');
      });
});
