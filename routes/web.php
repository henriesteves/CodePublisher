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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(['middleware' => 'auth'], function() {
    Route::resource('category', 'CategoryController', ['except' => 'show']);
    Route::get('category/{category}/confirm', ['as' => 'category.confirm', 'uses' => 'CategoryController@confirm']);

    Route::resource('book', 'BookController', ['except' => 'show']);
    Route::get('book/{book}/confirm', ['as' => 'book.confirm', 'uses' => 'BookController@confirm']);
});
