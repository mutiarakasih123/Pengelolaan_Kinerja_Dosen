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
            session(['userId' => $users[0]->id_user ]);
            session(['email' => $users[0]->email ]);
            session(['accessId' => $users[0]->id_akses]);
            return redirect('/home');
        }else{
            return view('login')->with('message', 'Username tidak terdaftar.');
        }
    }
}
