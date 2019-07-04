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

Route::get('/home', 'HomeController@index')->name('home');


# RoleController
Route::get('role', ['as' => 'role.index','uses' => 'Backend\RoleController@index']);
Route::get('role/datatables', ['as' => 'role.datatables', 'uses' => 'Backend\RoleController@dataTables']);
Route::get('role/show/{id}', ['as' => 'role.show', 'uses' => 'Backend\RoleController@show']);
Route::get('role/create', ['as' => 'role.create', 'uses' => 'Backend\RoleController@create']);
Route::post('role/create', ['as' => 'role.store', 'uses' => 'Backend\RoleController@store']);
Route::get('role/edit/{id}', ['as' => 'role.edit', 'uses' => 'Backend\RoleController@edit']);
Route::put('role/update/{id}', ['as' => 'role.update', 'uses' => 'Backend\RoleController@update']);
Route::get('role/delete/{id}', ['as' => 'role.delete', 'uses' => 'Backend\RoleController@destroy']);
Route::resource('role','Backend\RoleController');

# MenuController
Route::get('menu', ['as' => 'menu.index','uses' => 'Backend\MenuController@index']);
Route::get('menu/datatables', ['as' => 'menu.datatables', 'uses' => 'Backend\MenuController@dataTables']);
Route::get('menu/show/{id}', ['as' => 'menu.show', 'uses' => 'Backend\MenuController@show']);
Route::get('menu/create', ['as' => 'menu.create', 'uses' => 'Backend\MenuController@create']);
Route::post('menu/create', ['as' => 'menu.store', 'uses' => 'Backend\MenuController@store']);
Route::get('menu/edit/{id}', ['as' => 'menu.edit', 'uses' => 'Backend\MenuController@edit']);
Route::put('menu/edit/{id}', ['as' => 'menu.update', 'uses' => 'Backend\MenuController@update']);
Route::get('menu/delete/{id}', ['as' => 'menu.delete', 'uses' => 'Backend\MenuController@destroy']);
Route::resource('menu','Backend\MenuController');

# UserController
Route::get('user', ['as' => 'user.index','uses' => 'Backend\UserController@index']);
Route::get('user/datatables', ['as' => 'user.datatables', 'uses' => 'Backend\UserController@dataTables']);
Route::get('user/show/{id}', ['as' => 'user.show', 'uses' => 'Backend\UserController@show']);
Route::get('user/create', ['as' => 'user.create', 'uses' => 'Backend\UserController@create']);
Route::post('user/create', ['as' => 'user.store', 'uses' => 'Backend\UserController@store']);
Route::get('user/edit/{id}', ['as' => 'user.edit', 'uses' => 'Backend\UserController@edit']);
Route::put('user/update/{id}', ['as' => 'user.update', 'uses' => 'Backend\UserController@update']);
Route::get('user/delete/{id}', ['as' => 'user.delete', 'uses' => 'Backend\UserController@destroy']);
Route::resource('user','Backend\UserController');

#frontend
Route::get('frontend', ['as' => 'frontend.index','uses' => 'Frontend\FrontController@index']);
