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

Route::group(['prefix' => 'projects', 'middleware' => 'auth'], function() {
    Route::get('new', 'Admin\ProjectController@add');
    Route::post('new', 'Admin\ProjectController@create');
});

Route::group(['prefix' => 'tasks', 'middleware' => 'auth'], function() {
    Route::get('new', 'Admin\TaskController@add');
    Route::post('new', 'Admin\TaskController@create');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
