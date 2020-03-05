<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Date;
use Illuminate\Support\Facades\File;

class TataUsahaController extends Controller
{
    public function viewforminput(Request $request)
    {
         $jurusan = $request->input('jurusan');
         $subunsur = $request->input('subunsur');
         $kegiatan = $request->input('kegiatan');
         $prodi = $request->input('prodi');
         $namadosenpengajar_teori = $request->input('namadosenpengajar_teori');
         $namadosenpengajar_praktek = $request->input('namadosenpengajar_praktek');
                  
         DB::insert("INSERT INTO `tblinput`(`id_input`, `jurusan`, `subunsur`, `kegiatan`, 
                    `prodi`, `namadosenpengajar_teori`, `namadosenpengajar_praktek`) 
        VALUES (?, ?, ?, ?, ?, ?, ? )", [null, $jurusan, $subunsur, $kegiatan,
                $prodi, $namadosenpengajar_teori, $namadosenpengajar_praktek]);
                return redirect("/tu.tu-listinput");        
    }
    public function input(Request $request)
    {
        // $input = DB::select
    }
}