<?php


use Illuminate\Support\Facades\Route;


  Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin' , 'verified'])->group(function () {
      Route::prefix('roles')->name('roles.')->group(function () {
            Route::get('index', 'AdminController@index')->name('index')->can('view roles');
            Route::post('store', 'AdminController@store')->name('store')->can('add roles');
            Route::get('show/{id}', 'AdminController@show')->name('show')->can('view roles');
            Route::post('update', 'AdminController@update')->name('update')->can('edit roles');
            Route::post('assign_users', 'AdminController@assignUsersToRole')->name('assign_users')->can('assign users to role');
            Route::post('remove_user_from_role' , 'AdminController@removeUserFromRole')->name('remove_user_from_role')->can('remove users from role');
            Route::post('remove_users_from_role' , 'AdminController@removeUsersFromRole')->name('remove_users_from_role')->can('remove users from role');
    });
});
