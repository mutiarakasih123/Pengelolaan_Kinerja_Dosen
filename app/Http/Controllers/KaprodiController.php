<?php

namespace App\Http\Controllers;

use App\kaprodi;
use Illuminate\Http\Request;

class KaprodiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kaprodi = kaprodi::all();
    	return view('kaprodi/index',['kaprodi' => $kaprodi]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        kaprodi::create(['nama_prodi' => $request->nama_prodi]);
        return redirect('/Kaprodi');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\kaprodi  $kaprodi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kaprodi = kaprodi::find($id);
        return ['kaprodi' => $kaprodi];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\kaprodi  $kaprodi
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $kaprodi = kaprodi::find($id);
        $kaprodi->nama_prodi = $request->nama_prodi;
        $kaprodi->save();

        return redirect('/Kaprodi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\kaprodi  $kaprodi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kaprodi = kaprodi::find($id);
        $kaprodi->delete();
        return redirect('/Kaprodi');
    }
}
