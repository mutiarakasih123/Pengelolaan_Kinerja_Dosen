<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
// use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use DateTime;

class UserController extends Controller
{
    public function viewHome()
    {
        $spotsfoto = DB::select('SELECT tblSpotFoto.id, tblSpotFoto.nama_tempat, tblSpotFoto.harga, 
        tblSpotFoto.dari_waktu,tblSpotFoto.sampai_waktu, tblImageSpot.path, tblOrder.spotFotoId
                                 FROM `tblSpotFoto` 
                                 LEFT JOIN tblImageSpot on tblSpotFoto.id = tblImageSpot.spotFoto_id
                                 LEFT JOIN tblOrder on tblSpotFoto.id = tblOrder.spotFotoId
                                 WHERE tblOrder.spotFotoId IS NULL
                                 GROUP BY tblSpotFoto.id');

        return view('home')->with('spotsfoto', $spotsfoto);
    }
    
    public function viewLogin(){
        return view('login');
    }

    public function viewRegister(){
        
        return view('register');
    }

    public function viewPesanSpotfoto(Request $request)
    {
        $spot_foto = DB::select('SELECT tblSpotFoto.id, tblSpotFoto.nama_tempat, tblSpotFoto.latitude, lokasi_jemput,
        tblSpotFoto.longtitude, tblSpotFoto.dari_waktu, tblSpotFoto.sampai_waktu, tblSpotFoto.harga, 
        tblSpotFoto.deskripsi, tblUser.name as driver
                                FROM `tblSpotFoto` 
                                LEFT JOIN tblUser on tblSpotFoto.driverId = tblUser.id
                                WHERE tblSpotFoto.id = ?', [$request->id])[0];
                                
        $images = DB::select('SELECT * FROM `tblImageSpot` WHERE tblImageSpot.spotFoto_id = ?', [$request->id]);
        $spot_foto->dari_waktu = new DateTime($spot_foto->dari_waktu);
        $spot_foto->sampai_waktu = new DateTime($spot_foto->sampai_waktu);
       
        return view('pesanan.form')->with(['spot_foto' => $spot_foto, 'images' => $images]);
    }

    public function viewDaftarPesanan()
    {
        $userId = session('userId');
        $orders = DB::select('SELECT tblOrder.id, tblSpotFoto.id AS spotFotoId, tblSpotFoto.nama_tempat, 
        tblSpotFoto.dari_waktu, tblSpotFoto.sampai_waktu, tblSpotFoto.harga, tblOrder.done 
                              FROM `tblOrder` 
                              INNER JOIN tblSpotFoto ON tblOrder.spotFotoId = tblSpotFoto.id
                              WHERE tblOrder.userId = ? ', [$userId]);
                              
        return view('pesanan.list')->with('orders', $orders);
    }

    public function simpanPesananSpotfoto(Request $request)
    {
        $userId = session('userId');
        $spotfotoId = $request->input('id');
        $lokasi_jemput = $request->input('lokasi_jemput');
        $values = [$userId, $spotfotoId];
        $orders = DB::select('SELECT * FROM `tblOrder` WHERE tblOrder.spotFotoId = ?', [$spotfotoId]);

        if(count($orders)){
            echo('Pesanan sudah dipesan.');
            return;
        }

        DB::update('UPDATE `tblspotfoto` SET `lokasi_jemput` = ? WHERE `tblspotfoto`.`id` = ?', [$lokasi_jemput, $spotfotoId]);
        
        DB::insert('INSERT INTO `tblOrder`(`id`, `userId`, `spotFotoId`, `done`) 
                    VALUES ( null, ?, ?, 0)', $values);

        return redirect('/daftar-pesanan');
    }

    public function batalPesanan(Request $request)
    {
        DB::delete('DELETE FROM `tblOrder` WHERE `tblOrder`.`id` = ?', [$request->id]);
        return redirect('/daftar-pesanan');
    }

    public function daftar(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $date_birth = $request->input('date_birth');
        $password = $request->input('password');
        $confirm_password = $request->input('confirm_password');
        $accessId = 2; //user
        $accessName = 'User';

        if($password != $confirm_password){
            return view("/register")->with('message', 'Password tidak sesuai.');
        }else{
            $encrypPassword = Hash::make($password);
            $values = [null, $name, $email, $date_birth, $encrypPassword, $accessId];
            $isSuccessSave = DB::insert('insert into tblUser (id, name, email, date_birth, password, accessId) 
                        values (?, ?, ?, ?, ?, ?)', $values);

            if($isSuccessSave){
                return redirect('/login');
            }else{
                return view("/register")->with('message', 'Terjadi kesalahan di server.');
            }
            
        }
    }

    public function login(Request $request)
    {
        $email = $request->input('email');
        $password =  $request->input('password');

        $users =  DB::select('select tblUser.id, tblUser.email, tblUser.password, tblAccess.name as accessName, 
        tblAccess.id as accessId from tblUser 
                                INNER JOIN tblAccess on tblUser.accessId = tblAccess.id
                                where email = ? LIMIT 1', [$email]);
        if(count($users) > 0){
            $user = $users[0];
            if(Hash::check($password, $user->password)){
                    echo("login <br/>");
                    session(['userId' => $user->id ]);
                    session(['username' => $user->email ]);
                    session(['accessId' => $user->accessName ]);
                    if($user->accessId == 1){
                        return redirect('/admin');
                    }
                    else if($user->accessId == 3){
                        return redirect('/driver-spotfoto');
                    }else{
                        return redirect('/');
                    }
                    
            }else{
                return view('login')->with('message', 'Password salah.');
            }
        }else{
            return view('login')->with('message', 'Username tidak terdaftar.');
        }
    }

    public function logout(){
        session(['userId' => null ]);
        session(['accessId' => null ]);

        return redirect('/login');
    }

    public function viewListUser()
    {
        $users = DB::select('SELECT tblUser.id, tblUser.name, tblUser.email, tblUser.date_birth FROM `tblUser`
                              WHERE tblUser.accessId = 2');

        return view('view-admin.users.list-user')->with('users', $users);
    }    

    public function deleteUser(Request $request)
    {
        DB::delete('DELETE FROM `tblUser` WHERE `tblUser`.`id` = ?', [$request->id]);
        return redirect('/users');
    }

    public function viewFormUser(Request $request)
    {
        $user = DB::select('SELECT * FROM `tblUser` WHERE `tblUser`.`id` = ?', [$request->id])[0];
        return view('/view-admin.users.form-user')->with('user', $user);
    }

    public function updateUser(Request $request)
    {
        $id = $request->input('id');
        $name = $request->input('name');
        $email = $request->input('email');
        $date_birth = $request->input('date_birth');

        DB::update('UPDATE `tblUser` 
                   SET `name` = ?, `email` = ?, `date_birth` = ? 
                   WHERE `tblUser`.`id` = ?', [$name, $email, $date_birth, $id]);

        return redirect('/user/'. $id);

    }
}