<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use DateTime;

class DriverController extends Controller
{
    

    public function deleteDriver(Request $request)
    {
        DB::delete('DELETE FROM `tblUser` WHERE `tblUser`.`id` = ?', [$request->id]);
        return redirect('/drivers');
    }

    
    public function updateDriver(Request $request)
    {
        $id = $request->input('id');
        $name = $request->input('name');
        $email = $request->input('email');
        $date_birth = $request->input('date_birth');
        $accessName = session('accessId');

        DB::update('UPDATE `tblUser` 
                   SET `name` = ?, `email` = ?, `date_birth` = ? 
                   WHERE `tblUser`.`id` = ?', [$name, $email, $date_birth, $id]);

        if($accessName == 'Admin') {
            return redirect('/driver/'. $id);
        }else{
            return redirect('/driver-profil');
        }
        

    }

    public function tambahDriver(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $date_birth = $request->input('date_birth');
        $password = $request->input('password');
        $confirm_password = $request->input('confirm_password');
        $accessId = 3; 

        if($password != $confirm_password){
            return view("/view-admin.drivers.insert-driver")->with('message', 'Password tidak sesuai.');
        }else{
            $encrypPassword = Hash::make($password);
            $values = [null, $name, $email, $date_birth, $encrypPassword, $accessId];
            $isSuccessSave = DB::insert('insert into tblUser (id, name, email, date_birth, password, accessId) 
                        values (?, ?, ?, ?, ?, ?)', $values);

            if($isSuccessSave){
               
                return redirect('/drivers');
            }else{
                return view("/view-admin.drivers.insert-driver")->with('message', 'Terjadi kesalahan di server.');
            }
        }

        
    }

    public function viewPesanan()
    {
        $userId = session('userId');
        $orders = DB::select('SELECT tblOrder.id, tblSpotFoto.id AS spotFotoId, tblSpotFoto.nama_tempat, 
        tblSpotFoto.dari_waktu, tblSpotFoto.sampai_waktu, tblSpotFoto.harga, tblOrder.done, tblUser.email 
                            FROM `tblOrder` 
                            LEFT JOIN tblSpotFoto ON tblOrder.spotFotoId = tblSpotFoto.id
                            LEFT JOIN tblUser ON tblUser.id = tblOrder.userId
                            WHERE tblSpotFoto.driverId = ?
                            GROUP BY tblOrder.id', [$userId]);

        return view('view-driver.pesanan.list')->with('orders', $orders);
    }
  
    public function selesaiPesanan(Request $request)
    {
        DB::update('UPDATE `tblorder` SET `done` = 1 WHERE `tblorder`.`id` = ?', [$request->id]);
        return redirect("/daftar-pesanan-driver");
    }

    public function viewListDriverForAdmin()
    {
        $drivers = DB::select('SELECT tblUser.id, tblUser.name, tblUser.email, tblUser.date_birth FROM `tblUser`
                              WHERE tblUser.accessId = 3');

        return view('view-admin.drivers.list-driver')->with('drivers', $drivers);
    }    

    public function viewFormDriverForAdmin(Request $request)
    {
        $driver = DB::select('SELECT * FROM `tblUser` WHERE `tblUser`.`id` = ?', [$request->id])[0];
        return view('/view-admin.drivers.update-driver')->with('driver', $driver);
    }
    
    public function viewTambahDriverForAdmin()
    {
        return view('/view-admin.drivers.insert-driver');
    }

    public function viewFormDriver(Request $request)
    {
        $userId = session('userId');
        $driver = DB::select('SELECT * FROM `tblUser` WHERE `tblUser`.`id` = ?', [$userId])[0];
        return view('/view-driver.profil.update-driver')->with('driver', $driver);
    }

    public function viewListSpotFoto()
    {
        $userId = session('userId');
        $spots_foto = DB::select('SELECT * FROM `tblSpotFoto` WHERE driverId = ?', [$userId]);
        return view('view-driver.spot-foto.list-spot-foto')->with('spots_foto', $spots_foto);
    }

    
}