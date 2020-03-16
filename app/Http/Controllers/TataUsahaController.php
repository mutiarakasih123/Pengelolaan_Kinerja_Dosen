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
        //  $file = $request->input('file');
         $kodemakul = $request->input('kodemakul');
         $namamakul = $request->input('namamakul');
         $jumlah_sks = $request->input('jumlah_sks');
         $kelas = $request->input('kelas');
         $sksteori_real = $request->input('sksteori_real');
         $skspraktek_real = $request->input('skspraktek_real');
        //  $nilai_teori = $request->input('nilai_teori');
        //  $nilai_praktek = $request->input('nilai_praktek');
         $namadosenpengajar = $request->input('namadosenpengajar');
         $total = $request->input('total');
                          
         DB::insert("INSERT INTO `tblreportkegiatan`(`id_reportkegiatan`,`jurusan`, `subunsur`, `kegiatan`, `prodi`, `th_ajaran`, `semester`, `tgl_mulai`, `tgl_selesai`, 
                                                    `kodemakul`, `namamakul`, `jumlah_sks`, `kelas`, `sksteori_real`, `skspraktek_real`, `namadosenpengajar`, `total`)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)", [null, $jurusan, $subunsur, $kegiatan, $prodi, $th_ajaran, $semester, $tgl_mulai, $tgl_selesai, $kodemakul, 
                                                                    $namamakul, $jumlah_sks, $kelas, $sksteori_real, $skspraktek_real, $namadosenpengajar, $total ]);
                return "ok";        
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