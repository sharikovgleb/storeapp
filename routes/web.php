<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Admin routes
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'as'=>'admin.', 'middleware' => ['auth']], function(){

    Route::get('/', 'AdminController@index')->name('index');

    Route::resource('category', 'CategoryController', ['middleware'=> ['admin'], 'except' => [
        'show']]);

    Route::resource('item', 'ItemController', ['middleware'=> ['moderator'], 'except' => [
        'show'
    ]]);

    Route::resource('user', 'UserController', ['middleware'=> ['admin'], 'except' => [
        'show', 'create', 'store'
    ]]);
});


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');



