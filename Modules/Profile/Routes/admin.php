<?php


use Illuminate\Support\Facades\Route;


  Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin' , 'verified'])->group(function () {
    Route::get('/profile', 'AdminController@edit')->name('profile.edit');
    Route::patch('/profile', 'AdminController@update')->name('profile.update');
    Route::delete('/profile','AdminController@destroy')->name('profile.destroy');
});
