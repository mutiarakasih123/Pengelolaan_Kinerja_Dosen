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
            session(['userId' => $users[0]->id ]);
            session(['email' => $users[0]->email ]);
            session(['accessId' => $users[0]->akses]);
            session(['jakademi' => $users[0]->jakademi]);
            return redirect('/home');
        }else{
            return view('login')->with('message', 'Username tidak terdaftar.');
        }
    }

    public function logout(Request $request){
        $request->session()->forget('userId');
        $request->session()->forget('email');
        $request->session()->forget('accessId');
        return view('login');
    }

}
