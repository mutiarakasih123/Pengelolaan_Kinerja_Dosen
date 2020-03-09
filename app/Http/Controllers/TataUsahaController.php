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
    public function inputKegiatan(Request $request)
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
         $jumlah_sks = $request->input('jumlah_sks');
         $kelas = $request->input('kelas');
         $sks_teori = $request->input('sks_teori');
         $sks_praktek = $request->input('sks_praktek');
         $nilai_teori = $request->input('nilai_teori');
         $nilai_praktek = $request->input('nilai_praktek');
         $namadosenpengajar_teori = $request->input('namadosenpengajar_teori');
         $namadosenpengajar_praktek = $request->input('namadosenpengajar_praktek');
                     
         DB::insert("INSERT INTO `tblinput`(`id_input`, `jurusan`, `subunsur`, `kegiatan`, `prodi`,
                                             `th_ajaran`, `semester`, `tgl_mulai`, `tgl_selesai`, `file`,
                                            `kodemakul`, `namamakul`, `jumlah_sks`, `kelas`, `sks_teori`, 
                                            `sks_praktek`, `nilai_teori`, `nilai_praktek`, `namadosenpengajar_teori`)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?))", [null, $jurusan, $subunsur, $kegiatan,
                $prodi, $th_ajaran, $semester, $tgl_mulai, $tgl_selesai, $kodemakul, $namamakul, $sks_teori, $sks_praktek,
                $sesi_teori, $sesi_praktek, $nilai_teori,  $nilai_teori]);
                return redirect("/forminput");        
    }
    public function listKegiatan(Request $request)
    {
       $list = DB::select('SELECT * FROM `tblreportkegiatan`');
        return view('tu.tu-listinput')->with('listKegiatan', $list); 
    }
    public function kegiatanDetail(Request $request)
    {
        $list = DB::select('SELECT * FROM `tblnilai_pengajar` where id_reportkegiatan = ?', [$request->id]);
        return view('tu.tu-kegiatandetail')->with('kegiatanDetail', $list);
    }
}