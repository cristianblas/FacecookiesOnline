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
// CU1 gestion de perfil //admin
Route::get('user', 'GestionUserController@index')->name('usuarios.index');
Route::get('user/create', 'GestionUserController@create')->name('usuarios.create');
Route::post('user/store', 'GestionUserController@store')->name('usuarios.store');
Route::get('user/{id}/edit','GestionUserController@edit' )->name('usuarios.edit');
Route::match(['put','patch'],'users/{nombre}', 'GestionUserController@update')->name('usuarios.update');
Route::delete('user/{user}', 'GestionUserController@destroy')->name('usuarios.destroy');
Route::get('style/{style}', 'GestionUserController@change')->name('style');
Route::get('font/{font}', 'GestionUserController@changeFont')->name('font');

// CU2  gestion de contacos //usuario
Route::get('contacts','GestionContactsController@index')->name('contactos.index');
Route::get('contacts/{id}/edit','GestionContactsController@edit')->name('contactos.edit');
// CU3 buscador de amigos //usuario
Route::get('search','SearchFriendController@index')->name('busquedas.index');
// CU4 caja de busqueda de mensajes //usuario
Route::get('show','SearchMessageController@index')->name('chats.index');
// CU5 solicitud de amistad //usuario
Route::get('friend','RequestFriendController@index')->name('solicitudes.index');
Route::get('friend/{id}/store','RequestFriendController@store')->name('solicitudes.store');
Route::get('friend/{id}/edit','RequestFriendController@edit')->name('solicitudes.edit');
Route::get('friend/{id}/destroy','RequestFriendController@destroy')->name('solicitudes.destroy');
// CU6 gestion de mensajes y notificaciones
Route::get('/message/{id}','GestionMessageController@getMessage')->name('message');
Route::get('/message','GestionMessageController@sendMessage');
Route::get('/notification','GestionMessageController@getNotification')->name('notificaciones.index');
Route::get('/notification/{id}/destroy','GestionMessageController@destroyNotification')->name('notificaciones.destroy');
