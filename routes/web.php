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
    Route::post('user/new', 'Admin\UserController@create')->name('user.create');
    Route::get('/', 'Admin\UserController@index')->name('user.index');
    Route::get('user/{user}', 'Admin\UserController@showDetail')->name('user.showDetail');
    Route::get('user/{user}/edit', 'Admin\UserController@edit')->name('user.edit');
    Route::post('user/{user}/edit', 'Admin\UserController@update')->name('user.update');
    Route::get('user/{user}/delete', 'Admin\UserController@delete')->name('user.delete');
    Route::get('notification/new', 'Admin\NotificationController@add');
    Route::post('notification/new', 'Admin\NotificationController@create');
});

Route::group(['prefix' => '/', 'middleware' => 'auth'], function() {
    Route::get('setting', 'UserController@passwordChange')->name('passwordChange');
    Route::post('setting', 'UserController@setting')->name('setting');
    Route::get('', 'UserController@home');
});

Route::group(['prefix' => 'projects', 'middleware' => 'manager'], function() {
    Route::get('new', 'ProjectController@add');
    Route::post('new', 'ProjectController@create')->name('project.create');
    Route::get('/', 'ProjectController@index')->name('project.index');
    Route::get('{project}/edit', 'ProjectController@edit')->name('project.edit');
    Route::post('/', 'ProjectController@update')->name('project.update');
    Route::get('{project}/delete', 'ProjectController@delete')->name('project.delete');
    //Route::get('{id}/')
    Route::get('{project}/tasks', 'ProjectController@showgantt');
});

Route::group(['prefix' => 'tasks', 'middleware' => 'auth'], function() {
    Route::get('new', 'TaskController@add');
    Route::post('new', 'TaskController@create')->name('task.create');
    
});

Route::group(['prefix' => 'personaltasks', 'middleware' => 'auth'], function() {
    Route::get('new', 'PersonalTaskController@add');
    Route::post('new', 'PersonalTaskController@create')->name('personal_task.create');
    Route::get('{personal_task}/edit', 'PersonalTaskController@edit')->name('personal_task.edit');
    Route::post('{personal_task}/edit', 'PersonalTaskController@update')->name('personal_task.update');
    Route::get('showprogress', 'PersonalTaskController@showProgress')->name('personal_task.showProgress');
    Route::get('{personal_task}/detail', 'PersonalTaskController@showDetail')->name('personal_task.showDetail');
});

Route::group(['prefix' => 'clientcompanies', 'middleware' => 'manager'], function() {
    Route::get('/', 'ClientCompanyController@index')->name('client_company.index');
    Route::get('{client_company}/edit', 'ClientCompanyController@edit')->name('client_company.edit');
    Route::post('{client_company}/edit', 'ClientCompanyController@upadate')->name('client_company.update');
    Route::get('{client_company}/delete', 'ClientCompanyController@delete')->name('client_company.delete');
});

Route::group(['prefix' => 'clients', 'middleware' => 'manager'], function() {
    Route::get('/', 'ClientController@index')->name('client.index');
    Route::get('{client}/edit', 'ClientController@edit')->name('client.edit');
    Route::post('{client}/edit', 'ClientController@upadate')->name('client.update');
    Route::get('{client}/delete', 'ClientController@delete')->name('client.delete');
});
Route::get('client/{client}/showdetail', 'ClientController@showDetail')->middleware('auth')->name('client.showDetail');

Route::group(['prefix' => 'departments', 'middleware' => 'manager'], function() {
    Route::get('new', 'DepartmentController@add');
    Route::post('new', 'DepartmentController@create');
    Route::get('/', 'DepartmentController@index');
});

Route::group(['middleware' => 'auth'], function() {
    Route::get('projects/{project}/showprogress', 'TaskController@showProgress')->name('task.showProgress');
});  

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
