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
Route::post('/login', 'UserController@login');

Route::get('/daftar', 'UserController@viewregister');
Route::post('/daftar', 'UserController@daftar');

Route::get('/users-daftar', 'UserController@viewusers');
Route::post('/admin.users-daftar', 'UserController@users');
Route::post('/admin.list_users', 'UserController@users');
Route::get('/users', 'UserController@viewListUsers');
Route::post('/daftaruser', 'UserController@listUsers');
Route::post('/user', 'UserController@updateUser');

Route::get('/getKegiatanByIdSubUnsur/{id}', 'UserController@getKegiatanByIdSubUnsur');

Route::get('/', function () {
       return view('login');
})->middleware('auth');


Route::get('/keluar', function () {
    session(['accessId' => null]);
    return redirect("/login");
});

Route::get('/admin', function () {
    return view('admin.admin-navbar');
})->middleware('auth');

Route::get('/dosen', function () {
    return view('dosen.dosen-navbar');
})->middleware('auth');

Route::get('/tu', function () {
    return view('tu.tu-navbar');
})->middleware('auth');

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

// Route::get('/admin-navbar', function () {
//     return view('admin.admin-navbar');
// });

// Route::get('/tu', function () {
//     return view('tu.tu-navbar');
// });

Route::get('/admin.users-daftar ', function () {
    return view('admin.users-daftar');
});

Route::get('/admin.form-users ', function () {
    return view('admin.form-users');
});

Route::get('/tu.tu-riwayatkegiatan ', function () {
    return view('tu.tu-riwayatkegiatan');
});




