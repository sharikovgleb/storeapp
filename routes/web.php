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

    Route::resource('category', 'CategoryController', ['middleware' => 'admin', 'except' => [
        'show']]);

    Route::resource('item', 'ItemController', ['middleware'=> ['moderator'], 'except' => [
        'show'
    ]]);

    Route::resource('user', 'UserController', ['middleware'=> ['admin'], 'except' => [
        'show', 'create', 'store'
    ]]);

    Route::resource('order', 'OrderController', ['middleware'=> ['admin'], 'except' => [
        'show', 'create', 'store'
    ]]);
});

// Cart
Route::group(['prefix' => 'cart', 'as'=>'cart.', 'middleware' => ['auth'], 'namespace' => 'User'], function(){
    Route::get('/', 'CartController@index')->name('index');
    Route::get('/add/{item_id}/{quantity}', 'CartController@add')->name('add');
    Route::get('/delete/{item_id}', 'CartController@delete')->name('delete');
    Route::get('/decrease/{item_id}', 'CartController@decrease')->name('decrease');
    Route::get('/increase/{item_id}', 'CartController@increase')->name('increase');
});

// Order
Route::group(['prefix' => 'order','middleware' => 'auth', 'namespace' => 'User', 'as'=>'order.'], function()
{
    Route::get('/', 'OrderController@index')->name('index');
    Route::get('/create', 'OrderController@create')->name('create');
});



Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/show/{category}', 'HomeController@showInCategory')->name('home.showInCategory');




