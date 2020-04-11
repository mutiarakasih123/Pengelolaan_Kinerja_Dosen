<?php

namespace App\Http\Controllers;

use App\users;
use App\jurusan;
use App\kaprodi;
use DataTables;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = users::all();
    	return view('users/index',['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kaprodi = kaprodi::all();
        $jurusan = jurusan::all();
        return view('users/create',['kaprodi' => $kaprodi, 'jurusan' => $jurusan]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
    		'nama' => 'required',
            'email' => 'required',
            'nip' => 'required',
            'jabatan' => 'required',
            'jurusan' => 'required',
            'prodi' => 'required',
            'tgl_lahir' => 'required'
        ]);
        
        $hak = '';
        if ($request->jabatan == 'Admin') {
            $hak = 1;
        }elseif ($request->jabatan == 'Dosen') {
            $hak = 2;
        }elseif ($request->jabatan == 'TU') {
            $hak = 3;
        }
        users::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'nip' => $request->nip,
            'jabatan' => $request->jabatan,
            'jurusan' => $request->jurusan,
            'prodi' => $request->prodi,
            'tgl_lahir' =>$request->tgl_lahir,
            'password' => md5($request->email),
            'akses' => $hak
        ]);

        return redirect('/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\users  $users
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = users::find($id);
        return view('users/details', ['users' => $users]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\users  $users
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = users::find($id);
        return view('users/edit', ['users' => $users]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\users  $users
     * @return \Illuminate\Http\Response
     */
    public function update($id ,Request $request)
    {
        $this->validate($request,[
    		'nama' => 'required',
            'email' => 'required',
            'nip' => 'required',
            'jabatan' => 'required',
            'jurusan' => 'required',
            'prodi' => 'required',
            'tgl_lahir' => 'required'
        ]);
        
        $hak = '';
        if ($request->jabatan == 'Admin') {
            $hak = 1;
        }elseif ($request->jabatan == 'Dosen') {
            $hak = 2;
        }elseif ($request->jabatan == 'TU') {
            $hak = 3;
        }
        if ($request->password !== null) {
            $password = md5($request->password);
        }else{
            $password = $request->Oldpassword;
        }

        $users = users::find($id);
        $users->nama = $request->nama;
        $users->email = $request->email;
        $users->nip = $request->nip;
        $users->jabatan = $request->jabatan;
        $users->jurusan = $request->jurusan;
        $users->prodi = $request->prodi;
        $users->tgl_lahir = $request->tgl_lahir;
        $users->password = $password;
        $users->akses = $hak;
        $users->save();

        return redirect('/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\users  $users
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = users::find($id);
        $users->delete();
        return redirect('/users');
    }
}
