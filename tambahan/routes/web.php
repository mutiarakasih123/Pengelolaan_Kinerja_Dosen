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
use Illuminate\Support\Facades\DB;

Route::get('/', 'UserController@viewHome')->middleware('auth');
Route::get('/pesan-spotfoto/{id}', 'UserController@viewPesanSpotfoto')->middleware('auth');
Route::post('simpan-pesanan-spotfoto', 'UserController@simpanPesananSpotfoto')->middleware('auth');
Route::get('daftar-pesanan', 'UserController@viewDaftarPesanan')->middleware('auth');
Route::get('/batal-pesanan/{id}', 'UserController@batalPesanan')->middleware('auth');

Route::get('/admin', function () {
    return view('view-admin.home');
})->middleware('auth-admin');

// auth admin
Route::get('/admins', 'AdminController@viewListAdmin')->middleware('auth-admin');
Route::get('/admin-delete/{id}', 'AdminController@deleteAdmin')->middleware('auth-admin');
Route::get('/admin/{id}', 'AdminController@viewFormAdmin')->middleware('auth-admin');
Route::post('/admin', 'AdminController@updateAdmin')->middleware('auth-admin');

Route::get('/drivers', 'DriverController@viewListDriverForAdmin')->middleware('auth-admin');
Route::get('/driver-delete/{id}', 'DriverController@deleteDriver')->middleware('auth-admin');
Route::get('/driver/{id}', 'DriverController@viewFormDriverForAdmin')->middleware('auth-admin');
Route::post('/driver', 'DriverController@updateDriver')->middleware('auth-driver');
Route::get('/tambah-driver', 'DriverController@viewTambahDriverForAdmin')->middleware('auth-admin');
Route::post('/tambah-driver', 'DriverController@tambahDriver')->middleware('auth-admin');
Route::get('/spot-foto', 'AdminController@viewInsertSpotFoto')->middleware('auth-admin');
Route::post('/insert-spotfoto', 'AdminController@insertSpotFoto')->middleware('auth-admin');
Route::get('/list-spotfoto', 'AdminController@viewListSpotFoto')->middleware('auth-driver');
Route::get('/delete-spot-foto/{id}', 'AdminController@deleteSpotFoto')->middleware('auth-admin');
Route::get('/update-spot-foto/{id}', 'AdminController@viewUpdateSpotFoto')->middleware('auth-admin');
Route::post('/update-spot-foto', 'AdminController@updateSpotFoto')->middleware('auth-admin');
Route::get('/galery-spot-foto/{id}', 'AdminController@viewGalerySpotFoto')->middleware('auth-admin');
Route::post('/upload-spotfoto', 'AdminController@uploadSpotFoto')->middleware('auth-admin');
Route::get('/delete-image/{id}', 'AdminController@deleteImage')->middleware('auth-admin');
Route::get('pesanan-spot', 'AdminController@viewPesanan')->middleware('auth-admin');

Route::get('/users', 'UserController@viewListUser')->middleware('auth-admin');
Route::get('/user-delete/{id}', 'UserController@deleteUser')->middleware('auth-admin');
Route::get('/user/{id}', 'UserController@viewFormUser')->middleware('auth-admin');
Route::post('/user', 'UserController@updateUser')->middleware('auth-admin');

// auth driver
Route::get('/driver-profil', 'DriverController@viewFormDriver')->middleware('auth-driver');
Route::get('/driver-spotfoto', 'DriverController@viewListSpotFoto')->middleware('auth-driver');
Route::get('/daftar-pesanan-driver', 'DriverController@viewPesanan')->middleware('auth-driver');
Route::get('/selesai-pesanan/{id}', 'DriverController@selesaiPesanan')->middleware('auth-driver');

// tanpa auth
Route::get('/login', 'UserController@viewLogin');
Route::post('/login', 'UserController@login');
Route::get('/daftar', 'UserController@viewRegister');
Route::post('/daftar', 'UserController@daftar');
Route::get('/keluar', 'UserController@logout');

// Route::post('/register', 'UserController@test');

// Route::get('/db', function(){
//     // return DB::select('select * from tblTest');
//    return DB::select('select database();');
// });