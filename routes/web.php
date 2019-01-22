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
Route::get('/userlist', 'HomeController@userList');

Route::get('/admin','ADMIN\AppController@index')->name('admin.app');
Route::get('/admin/create','ADMIN\AppController@create')->name('admin.app.create');
Route::get('/admin/{user}/update','ADMIN\AppController@update')->name('admin.app.update');
Route::get('/admin/delete','ADMIN\AppController@delete')->name('admin.app.delete');



Route::get('/manager','Manager\AppController@index')->name('manager.app');
Route::get('/manager/update','Manager\AppController@index')->name('manager.update.app');
Route::get('/manager/delete','Manager\AppController@index')->name('manager.delete.app');

Route::get('/user','User\AppController@index')->name('user.app');