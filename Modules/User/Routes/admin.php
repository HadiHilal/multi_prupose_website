<?php


use Illuminate\Support\Facades\Route;


  Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin' , 'verified'])->group(function () {
      Route::prefix('users')->name('users.')->group(function () {
          Route::get('/' , 'AdminController@index')->name('index')->can('view users');
          Route::post('/delete/' , 'AdminController@destroy')->name('delete')->can('delete users');
          Route::get('/switch/{id}/{type}' , 'AdminController@switch')->name('switch')->can('switch users type');
      });
});
