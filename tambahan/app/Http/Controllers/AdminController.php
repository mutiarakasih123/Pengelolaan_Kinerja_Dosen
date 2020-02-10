<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use DateTime;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    public function viewListAdmin()
    {
        $admins = DB::select('SELECT tblUser.id, tblUser.name, tblUser.email, tblUser.date_birth FROM `tblUser`
                              WHERE tblUser.accessId = 1');

        return view('view-admin.admins.list-admin')->with('admins', $admins);
    }    

    public function deleteAdmin(Request $request)
    {
        DB::delete('DELETE FROM `tblUser` WHERE `tblUser`.`id` = ?', [$request->id]);
        return redirect('/admins');
    }

    public function viewFormAdmin(Request $request)
    {
        $admin = DB::select('SELECT * FROM `tblUser` WHERE `tblUser`.`id` = ?', [$request->id])[0];
        return view('/view-admin.admins.form-admin')->with('admin', $admin);
    }

    public function updateAdmin(Request $request)
    {
        $id = $request->input('id');
        $name = $request->input('name');
        $email = $request->input('email');
        $date_birth = $request->input('date_birth');

        DB::update('UPDATE `tblUser` 
                   SET `name` = ?, `email` = ?, `date_birth` = ? 
                   WHERE `tblUser`.`id` = ?', [$name, $email, $date_birth, $id]);

        return redirect('/admin/'. $id);

    }

    public function viewInsertSpotFoto()
    {
        $drivers = DB::select('SELECT * FROM `tblUser` WHERE `tblUser`.`accessId` = 3');
        return view('view-admin.spot-foto.form')->with('drivers', $drivers);
    }

    public function insertSpotFoto(Request $request)
    
    {
        $nama_tempat = $request->input('nama_tempat');
        $latitude = $request->input('latitude');
        $longtitude = $request->input('longtitude');
        $dari_waktu = $request->input('dari_waktu');
        $sampai_waktu = $request->input('sampai_waktu');
        $harga = $request->input('harga');
        $deskripsi = $request->input('deskripsi');
        $driverId = $request->input('driverId');
        $userId = session('userId');

        $values = [null, $userId, $nama_tempat, $latitude, $longtitude, $dari_waktu, $sampai_waktu, $harga, $deskripsi, $driverId];
            $isSuccessSave = DB::insert('insert into tblSpotFoto (id, adminId, nama_tempat, latitude, longtitude, 
            dari_waktu, sampai_waktu, harga, deskripsi, driverId) 
                        values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', $values);

        if($isSuccessSave){
            $drivers = DB::select('SELECT * FROM `tblUser` WHERE `tblUser`.`accessId` = 3');
            $parameters = ['drivers' => $drivers, 'messageSuccess' => 'Berhasil disimpan.'];
            return view('view-admin.spot-foto.form')->with($parameters);
        }else{
            $drivers = DB::select('SELECT * FROM `tblUser` WHERE `tblUser`.`accessId` = 3');
            $parameters = ['drivers' => $drivers, 'messageError', 'Terjadi kesalahan di server.'];
            return view('view-admin.spot-foto.form')->with($parameters);
        }
    }

    public function viewPesanan()
    {
        $orders = DB::select('SELECT tblOrder.id, tblSpotFoto.id AS spotFotoId, tblSpotFoto.nama_tempat, 
        tblSpotFoto.dari_waktu, tblSpotFoto.sampai_waktu, tblSpotFoto.harga, tblOrder.done, tblUser.email 
        FROM `tblOrder` 
        INNER JOIN tblSpotFoto ON tblOrder.spotFotoId = tblSpotFoto.id
        INNER JOIN tblUser ON tblUser.id = tblOrder.userId
        GROUP BY tblOrder.id');

        return view('view-admin.pesanan.list')->with('orders', $orders);
    }

    public function viewListSpotFoto()
    {
        // $userId = session('userId');
        // $spots_foto = DB::select('SELECT * FROM `tblSpotFoto` WHERE adminId = ?', [$userId]);
        $spots_foto = DB::select('SELECT * FROM `tblSpotFoto`');
        return view('view-admin.spot-foto.list-spot-foto')->with('spots_foto', $spots_foto);
    }

    public function deleteSpotFoto(Request $request)
    {
        DB::delete('DELETE FROM `tblSpotFoto` WHERE `tblSpotFoto`.`id` = ?', [$request->id]);
        return redirect('/list-spotfoto');
    }

    public function viewUpdateSpotFoto(Request $request)
    {
        $userId = session('userId');
        $spot_foto = DB::select('SELECT * FROM `tblSpotFoto` WHERE `tblSpotFoto`.`id` = ? AND `tblSpotFoto`.`adminId` = ?', [$request->id, $userId])[0];
        $spot_foto->dari_waktu = new DateTime($spot_foto->dari_waktu);
        $spot_foto->sampai_waktu = new DateTime($spot_foto->sampai_waktu);
       
        $drivers = DB::select('SELECT * FROM `tblUser` WHERE `tblUser`.`accessId` = 3');

        $parameters = ['spot_foto' => $spot_foto, 'drivers' => $drivers];
        return view('view-admin.spot-foto.update-spot-foto')->with($parameters);
    }

    public function updateSpotFoto(Request $request)
    {
        $id = $request->input('id');
        $nama_tempat = $request->input('nama_tempat');
        $latitude = $request->input('latitude');
        $longtitude = $request->input('longtitude');
        $dari_waktu = $request->input('dari_waktu');
        $sampai_waktu = $request->input('sampai_waktu');
        $harga = $request->input('harga');
        $deskripsi = $request->input('deskripsi');
        $driverId = $request->input('driverId');
        $userId = session('userId');

        $values = [$userId, $nama_tempat, $latitude, $longtitude, $dari_waktu, $sampai_waktu, $harga, $deskripsi, $driverId, $id];
        
        DB::update('UPDATE `tblSpotFoto` SET 
                                    `adminId` = ?, 
                                    `nama_tempat` = ?, 
                                    `latitude` = ?, 
                                    `longtitude` = ?, 
                                    `dari_waktu` = ?, 
                                    `sampai_waktu` = ?, 
                                    `harga` = ?, 
                                    `deskripsi` = ?, 
                                    `driverId` = ? 
                                WHERE `tblSpotFoto`.`id` = ?;', $values);

        return redirect('/update-spot-foto/'. $id);
    }

    public function viewGalerySpotFoto(Request $request)
    {
        $id = $request->id;
        $images = DB::select('SELECT * FROM `tblImageSpot` WHERE spotFoto_id = ?', [$id]); 
        return view('view-admin.galery.form')->with(['id' => $id, 'images' => $images]);
    }

    public function uploadSpotFoto(Request $request)
    {
        $uploader = session('username');
        $id = $request->input('id');
        $file = $request->file('image');
        $name = $uploader.'_'.(new DateTime())->format('Y-M-d H i s') .'_'.$file->getClientOriginalName();
        $path = 'images';
        $values = [null, $name, '/'.$path.'/'.$name, $id];

        $isSuccessSave = DB::insert('INSERT INTO `tblImageSpot` (`id`, `nama`, `path`, `spotFoto_id`) 
                        VALUES (?, ?, ?, ?)', $values);
        if($isSuccessSave){
            $file->move($path, $name);

            $images = DB::select('SELECT * FROM `tblImageSpot` WHERE spotFoto_id = ?', [$id]); 
            $values = ['id' => $id, 'images' => $images, 'messageSuccess' => 'Berhasil disimpan.'];
            return view('view-admin.galery.form')->with($values);
        }else{
            $images = DB::select('SELECT * FROM `tblImageSpot` WHERE spotFoto_id = ?', [$id]); 
            $values = ['id' => $id, 'images' => $images, 'messageError' => 'Terjadi kesalahan di server.'];
            return view('view-admin.galery.form')->with($values);
        }

    }

    public function deleteImage(Request $request)
    {
        $id = $request->id;
        $image = DB::select('SELECT * FROM `tblImageSpot` WHERE id = ?', [$id])[0]; 
        
        $image_path = app_path("../public".$image->path);
        
        if(File::delete($image_path)){
            DB::select('DELETE FROM `tblImageSpot` WHERE id = ?', [$id]); 
            return redirect('/galery-spot-foto/'. $id);
        }else{
            echo("an error ouccured, can not delete your image");
        };
        
        
    }
    
}