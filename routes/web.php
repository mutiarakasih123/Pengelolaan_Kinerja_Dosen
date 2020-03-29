<?php

use Illuminate\Http\Request;

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
       return view('login');
});

// for action login
Route::post('/login', 'login@index');
Route::get('/home', function () { return view('dashboard'); });
Route::get('/login', 'UserController@viewLogin');

// for action logout
Route::get('/logout', 'login@logout');

// for action menu users
Route::get('/users', 'UsersController@index');
Route::get('users/create','UsersController@create');
Route::post('/users/store', 'UsersController@store');
Route::get('/users/edit/{id}', 'UsersController@edit');
Route::put('/users/update/{id}', 'UsersController@update');
Route::get('/users/destroy/{id}', 'UsersController@destroy');
Route::get('/users/show/{id}', 'UsersController@show');

// for action menu Kaprodi
Route::get('/Kaprodi', 'KaprodiController@index');
Route::post('/Kaprodi/store', 'KaprodiController@store');
Route::get('/Kaprodi/edit/{id}', 'KaprodiController@edit');
Route::put('/Kaprodi/update/{id}', 'KaprodiController@update');
Route::get('/Kaprodi/destroy/{id}', 'KaprodiController@destroy');

// for action menu Jurusan
Route::get('/Jurusan', 'JurusanController@index');
Route::post('/Jurusan/store', 'JurusanController@store');
Route::get('/Jurusan/edit/{id}', 'JurusanController@edit');
Route::put('/Jurusan/update/{id}', 'JurusanController@update');
Route::get('/Jurusan/destroy/{id}', 'JurusanController@destroy');

// for action menu Pelaksanaan
Route::get('/Pelaksanaan', 'PelaksanaanController@index');
Route::get('Pelaksanaan/create','PelaksanaanController@create');
Route::post('/Pelaksanaan/store', 'PelaksanaanController@store');
Route::get('/Pelaksanaan/edit/{id}', 'PelaksanaanController@edit');
Route::put('/Pelaksanaan/update/{id}', 'PelaksanaanController@update');
Route::get('/Pelaksanaan/destroy/{id}', 'PelaksanaanController@destroy');
Route::get('/Pelaksanaan/show/{id}', 'PelaksanaanController@show');
