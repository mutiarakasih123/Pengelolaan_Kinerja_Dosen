<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class login extends Controller
{
    public function index(Request $request)
    {
        $email = $request->input('email');
        $password = md5($request->input('password'));
        $users = DB::table('tbluser')
                    ->select('*')
                    ->where('email', '=', $email)
                    ->where('password', '=', $password)
                    ->get();
        if(count($users) > 0){
            session([
                'userId' => $users[0]->id,
                'email' => $users[0]->email,
                'accessId' => $users[0]->akses,
                'jakademi' => $users[0]->jakademi,
                'prodi' => $users[0]->prodi,
                'jurusan' => $users[0]->jurusan
            ]);
            return redirect('/home');
        }else{
            return view('login')->with('message', 'Username tidak terdaftar.');
        }
    }

    public function logout(Request $request){
        $request->session()->forget('userId','email','accessId','jakademi','prodi','jurusan');
        return view('login');
    }

}
