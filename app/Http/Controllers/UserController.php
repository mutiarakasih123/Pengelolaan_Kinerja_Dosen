<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Date;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    public function viewLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $users = DB::select('SELECT tbluser.id_user, tbluser.email, tbluser.password, tblakses.nama_akses, tblakses.nama_akses 
                            AS accesname, tblakses.id_akses AS accessId FROM tbluser 
                            INNER JOIN tblakses ON tbluser.id_akses = tblakses.id_akses 
                            WHERE email = ? LIMIT 1', [$email]);
        if(count($users) > 0){
            $user = $users[0];
            if(md5($password) == $user->password){
                session(['userId' => $user->id_user ]);
                session(['email' => $user->email ]);
                session(['accessId' => $user->accesname]);
                 if ($user->accessId == 1){
                    return redirect('/admin');
                }
                else if ($user->accessId == 2){
                    return redirect('/dosen');
                }
                else if($user->accessId == 3) {	
                    return redirect('/tu');
                }
            }else{
                return view('login')->with('message', 'Password salah.');
            }
        }else{
            return view('login')->with('message', 'Username tidak terdaftar.');
        }
     }
     public function daftar(Request $request)
     {
         $name = $request->input('name');
         $email = $request->input('email');
         $nip = $request->input('nip');
         $jabatan = $request->input('jabatan');
         $jurusan = $request->input('jurusan');
         $prodi = $request->input('prodi');
         $tgl_lahir = $request->input('tgl_lahir');
         $password = $request->input('password');
         $ulangi_password = $request->input('ulangi_password');

         DB::insert("INSERT INTO `tbluser`(`id_user`, `nama`, `nip`, `jabatan`, `tgl_lahir`, `jurusan`, `prodi`, `email`, `password`, `id_akses`) 
         VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ? )", [null, $name, $nip, $jabatan, $tgl_lahir, $jurusan, $prodi, $email, md5($password), 2]);  
        return redirect("/login");  
    }
    public function users(Request $request)
     {
         $name = $request->input('nama');
         $email = $request->input('email');
         $nip = $request->input('nip');
         $jabatan = $request->input('jabatan');
         $jurusan = $request->input('jurusan');
         $prodi = $request->input('prodi');
         $tgl_lahir = $request->input('tgl_lahir');
         $password = $request->input('password');
         $ulangi_password = $request->input('ulangi_password');

         DB::insert("INSERT INTO `tbluser`(`id_user`, `nama`, `nip`, `jabatan`, `tgl_lahir`, `jurusan`, `prodi`, `email`, `password`, `id_akses`) 
         VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ? )", [null, $name, $nip, $jabatan, $tgl_lahir, $jurusan, $prodi, $email, md5($password), 3]);  
        return redirect("/users"); 
         
    }
    public function listUser(Request $request)
    {
        $name = $request->input('nama');
        $email = $request->input('email');
        $nip = $request->input('nip');
        $jabatan = $request->input('jabatan');
        $jurusan = $request->input('jurusan');
        $prodi = $request->input('prodi');
        $tgl_lahir = $request->input('tgl_lahir');
        $password = $request->input('password');
        $ulangi_password = $request->input('ulangi_password');

        DB::insert("INSERT INTO `tbluser`(`id_user`, `nama`, `nip`, `jabatan`, `tgl_lahir`, `jurusan`, `prodi`, `email`, `password`, `id_akses`) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ? )", [null, $name, $nip, $jabatan, $tgl_lahir, $jurusan, $prodi, $email, md5($password), 3]);  
       return redirect("/admin.list_users"); 
        
   }

    public function viewListUsers(Request $request)
    {
        $users = DB::select ('SELECT  tbluser.id_user, tbluser.nama, tbluser.email, tbluser.nip, tbluser.jabatan, tbluser.jurusan, tbluser.prodi, 
        tbluser.tgl_lahir from `tbluser` WHERE tbluser.id_akses = 3'); 

       return view('admin.list_users')->with('users', $users);        
    }
    public function updateUser(Request $request)
    {
        $id_user = $request->input('id_user');
        $name = $request->input('nama');
        $nip = $request->input('nip');
        $email = $request->input('email');
        $jabatan = $request->input('jabatan');
        $jurusan = $request->input('jurusan');
        $prodi = $request->input('prodi');
        $tgl_lahir = $request->input('tgl_lahir');

        DB::update('UPDATE `tblUser` 
                   SET `nama` = ?, `nip` = ?, `email` = ?, `date_birth` = ?, `jabatan` = ?,
                   `jurusan` = ?, `prodi` = ?, `tgl_lahir` = ?,
                   WHERE `tblUser`.`id_user` = ?', [$nama, $nip, $email, $jabatan, $jurusan, $prodi, $tgl_lahir]);
        return view('/user/'. $id_user);
    }
    public function getKegiatanByIdSubUnsur(Request $request)
    {
      return  DB::select('SELECT * FROM `tblkegiatan` WHERE `id_subunsur`=?',[$request->id]);
    
    }    
    public function deleteuser(Request $request)
    {
        DB::delete('DELETE FROM `tbluser` WHERE `tbluser`.`id_user` = ?', [$request->id]);
        return redirect('/users');
    }
}