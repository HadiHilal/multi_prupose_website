<?php


use Illuminate\Support\Facades\Route;


  Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin' , 'verified'])->group(function () {
      Route::prefix('blogs')->name('blogs.')->group(function () {
          Route::get('/' , 'AdminController@index')->name('index')->can('view blogs');
          Route::get('/create' , 'AdminController@create')->name('create')->can('add blogs');
          Route::post('/store' , 'AdminController@store')->name('store')->can('add blogs');
          Route::post('/update' , 'AdminController@update')->name('update')->can('edit blogs');
          Route::get('/edit/{id}' , 'AdminController@edit')->name('edit')->can('edit blogs');
          Route::get('/delete/{id}' , 'AdminController@destroy')->name('delete')->can('delete blogs');
      });
});
