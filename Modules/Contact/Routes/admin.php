<?php


use Illuminate\Support\Facades\Route;


  Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin' , 'verified'])->group(function () {
      Route::prefix('contacts')->name('contacts.')->group(function () {
          Route::get('/' , 'AdminController@index')->name('index')->can('view contacts');
           Route::get('/delete/{id}' , 'AdminController@destroy')->name('delete')->can('delete contacts');
      });
});
