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
Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function() {
    Route::get('user/new', 'Admin\UserController@add');
    Route::post('user/new', 'Admin\UserController@create');
    Route::get('/', 'Admin\UserController@index');
    Route::get('user/{user}/edit', 'Admin\UserController@edit')->name('user.edit');
    Route::put('user/{user}', 'Admin\UserController@update')->name('user.update');
});

Route::group(['prefix' => 'projects', 'middleware' => 'auth'], function() {
    Route::get('new', 'Admin\ProjectController@add');
    Route::post('new', 'Admin\ProjectController@create');
    Route::get('/', 'Admin\ProjectController@index');
    Route::get('{id}/edit', 'Admin\ProjectController@edit');
    Route::post('/', 'Admin\ProjectController@update');
    Route::get('{id}/delete', 'Admin\ProjectController@delete');
});

Route::group(['prefix' => 'tasks', 'middleware' => 'auth'], function() {
    Route::get('new', 'Admin\TaskController@add');
    Route::post('new', 'Admin\TaskController@create');
});

Route::group(['prefix' => 'personaltasks', 'middleware' => 'auth'], function() {
    Route::get('new', 'Admin\PersonalTaskController@add');
    Route::post('new', 'Admin\PersonalTaskController@create');
});

Route::group(['prefix' => 'clientcompanies', 'middleware' => 'auth'], function() {
    Route::get('new', 'Admin\ClientCompanyController@add');
    Route::post('new', 'Admin\ClientCompanyController@create');
});

Route::group(['prefix' => 'clients', 'middleware' => 'auth'], function() {
    Route::get('new', 'Admin\ClientController@add');
    Route::post('new', 'Admin\ClientController@create');
});
    

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
