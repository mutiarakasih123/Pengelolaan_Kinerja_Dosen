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
Route::get('/login', 'UserController@viewLogin');
Route::post('/', 'UserController@Login');
Route::post('/login', 'UserController@Login');

Route::get('/register-dosen', 'UserController@viewregister');
Route::post('/register-dosen', 'UserController@register');

//Testing
Route::get('/admin-navbar', function () {
    return view('admin.admin-navbar');
});

 Route::get('/navbar', function () {
     return view('navbar');
 });

Route::get('/', function () {
       return view('login');
});

Route::get('/admin', function () {
    return view('admin-navbar');
});

Route::get('/register-dosen', function () {
    return view('register-dosen');
});

Route::get('/navbar', function () {
    return view('home');
});

Route::get('/tu.tu-melaksanakankuliahan', function () {
    return view('tu.tu-melaksanakankuliahan');
});

Route::get('/tu.tu-formmelaksanakankuliahan', function () {
    return view('tu.tu-formmelaksanakankuliahan');
});

Route::get('/tu.tu-inputdetail', function () {
    return view('tu.tu-inputdetail');
});

Route::get('/dosen-navbar', function () {
    return view('dosen.dosen-navbar');
});

Route::get('/admin-navbar', function () {
    return view('admin.admin-navbar');
});

Route::get('/tu-navbar', function () {
    return view('tu.tu-navbar');
});



