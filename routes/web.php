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

//Route::resource('user','UserController');


//Admin::routes()

Auth::routes();
Route::get('/home','HomeController@index')->name('home');
// CU1 para el admin
Route::get('user', 'GestionUserController@index')->name('usuarios.index');
Route::get('user/create', 'GestionUserController@create')->name('usuarios.create');
Route::post('user/store', 'GestionUserController@store')->name('usuarios.store');
Route::get('user/{id}/edit','GestionUserController@edit' )->name('usuarios.edit');
Route::match(['put','patch'],'users/{nombre}', 'GestionUserController@update')->name('usuarios.update');
Route::delete('user/{user}', 'GestionUserController@destroy')->name('usuarios.destroy');

Route::
