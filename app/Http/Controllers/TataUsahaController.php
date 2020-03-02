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
    public function formmelaksanakankuliahan(Request $request)
    {
         $jurusan = $request->input('jurusan');
         $subunsur = $request->input('subunsur');
         $kegiatan = $request->input('kegiatan');
         $prodi = $request->input('prodi');
         $th_ajaran = $request->input('th_ajaran');
         $semester = $request->input('semester');
         $tgl_mulai = $request->input('tgl_mulai');
         $tgl_selesai = $request->input('tgl_selesai');
         $kodemakul = $request->input('kodemakul');
         $namamakul = $request->input('namamakul');
         $sks_teori = $request->input('sks_teori');
         $sks_praktek = $request->input('sks_praktek');
         $namadosenpengajar_teori = $request->input('namadosenpengajar_teori');
         $namadosenpengajar_praktek = $request->input('namadosenpengajar_praktek');
         
         
         DB::insert("INSERT INTO `tblinput`(`id_input`, `jurusan`, `subunsur`, `kegiatan`, 
                    `prodi`, `th_ajaran`, `semester`, `tgl_mulai`, `tgl_selesai`, 
                    `kodemakul`, `namamakul`, `sks_teori`, `sks_praktek`, `namadosenpengajar_teori`, 
                    `namadosenpengajar_praktek`) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ? )", [null, $jurusan, $subunsur, $kegiatan,
                $prodi, $th_ajaran, $semester, $tgl_mulai, $tgl_selesai, $kodemakul, $namamakul, $sks_teori,
                $sks_praktek, $namadosenpengajar_teori, $namadosenpengajar_praktek]);
                return redirect("/tu.tu-formmelaksanakankuliahan");        
    }
}