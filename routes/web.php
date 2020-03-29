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










Route::get('/users-daftar', 'UserController@viewusers');
Route::post('/admin.users-daftar', 'UserController@users');
Route::post('/admin.users-edit', 'UserController@userEditPost');
Route::post('/admin.list_users', 'UserController@users');
Route::post('/daftaruser', 'UserController@listUsers');

Route::post('/inputKegiatan', 'TataUsahaController@inputKegiatan');
Route::get('/listKegiatan', 'TataUsahaController@listKegiatan');
Route::get('/kegiatan/{id}', 'TataUsahaController@kegiatanDetail');

Route::get('/user-delete/{id}', 'UserController@deleteuser');

Route::get('/getKegiatanByIdSubUnsur/{id}', 'UserController@getKegiatanByIdSubUnsur');






Route::get('/admin', function () {
    return view('admin.admin-navbar');
})->middleware('auth');

Route::get('/dosen', function () {
    return view('dosen.dosen-navbar');
})->middleware('auth');

Route::get('/tu', function () {
    return view('tu.tu-navbar');
})->middleware('auth');

Route::get('/forminput', function () {
    return view('/tu/tu-formmelaksanakankuliahan');
});

Route::get('/usersedit/{id}', 'UserController@userEdit');

Route::get('/register-dosen', function () {
    return view('register-dosen');
});

Route::get('/navbar', function () {
    return view('home');
});




Route::get('/tu.tu-inputdetail', function () {
    return view('tu.tu-inputdetail');
});

Route::get('/dosen-navbar', function () {
    return view('dosen.dosen-navbar');
});

Route::get('/tu.tu-listinput', function () {
    return view('tu.tu-listinput');
});


Route::get('/admin.users-daftar ', function () {
    return view('admin.users-daftar');
});

Route::get('/admin.form-users ', function () {
    return view('admin.form-users');
});

Route::get('/tu.tu-riwayatkegiatan ', function () {
    return view('tu.tu-riwayatkegiatan');
});




