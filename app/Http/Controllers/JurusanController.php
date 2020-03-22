<?php

namespace App\Http\Controllers;

use App\jurusan;
use App\kaprodi;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jurusan = DB::select('SELECT tbljurusan.id, tbljurusan.nama_jurusan, tblprodi.nama_prodi from tbljurusan INNER JOIN tblprodi ON tbljurusan.idKaprodi=tblprodi.id ');
        $kaprodi = kaprodi::All();
    	return view('jurusan/index',['jurusan' => $jurusan, 'kaprodi' => $kaprodi]);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        jurusan::create(['nama_jurusan' => $request->nama_jurusan, 'idKaprodi' => $request->idKaprodi]);
        return redirect('/Jurusan');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\jurusan  $jurusan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jurusan = jurusan::find($id);
        return ['jurusan' => $jurusan];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\jurusan  $jurusan
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $jurusan = jurusan::find($id);
        $jurusan->nama_jurusan = $request->nama_jurusan;
        $jurusan->idKaprodi = $request->idKaprodi;
        $jurusan->save();

        return redirect('/Jurusan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\jurusan  $jurusan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jurusan = jurusan::find($id);
        $jurusan->delete();
        return redirect('/Jurusan');
    }
}
