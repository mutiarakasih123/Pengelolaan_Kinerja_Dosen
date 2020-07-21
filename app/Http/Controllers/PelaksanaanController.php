<?php

namespace App\Http\Controllers;

use App\pelaksanaan;
use App\jurusan;
use App\users;
use App\kaprodi;
use App\subUnsur1;
use App\subUnsur23;
use App\subUnsur4;
use App\subUnsur5;
use App\subUnsur6;
use App\sesi;
use App\countSks;
use ZipArchive;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Exports\PelaksanaanExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;


class PelaksanaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelaksanaan = DB::select('SELECT *, a.id as idP from pelaksanaan a INNER JOIN tbljurusan b ON b.id = a.idJurusan INNER JOIN tblprodi c ON c.id = a.idProdi');
    	return view('pelaksanaan/index',['pelaksanaan' => $pelaksanaan]);
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
        $users = DB::select('SELECT * from tbluser WHERE akses = 2 ');
    	return view('pelaksanaan/create',['kaprodi' => $kaprodi, 'jurusan' => $jurusan, 'users' => $users]);
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
            'kaprodi' => 'required',
            'jurusan' => 'required',
            'subUnsur' => 'required',
            'kegiatan' => 'required',
            'tahunAjaran' => 'required',
            'semester' => 'required',
            'Tmulai' => 'required',
            'Tselesai' => 'required',
            'penugasan' => 'required',
            'dokumen' => 'required',
            'filePendukung' => 'required|mimes:doc,docx,xls,xlsx,pdf',
        ]);
        if ($request->subUnsur == 1) {
            $this->validate($request,[
                'kodeMK' => 'required',
                'jumSks' => 'required',
                'sksT' => 'required',
                'namaMK' => 'required',
                'kelas' => 'required',
                'sksP' => 'required',
            ]);
        }
        $file = $request->file('filePendukung');
        $rename = time()."_".$file->getClientOriginalName();
        $folder = 'uploadFiles';
        $file->move($folder,$rename);

        DB::beginTransaction();
        try {
            $pelaksanaan = new pelaksanaan;
            $pelaksanaan->idJurusan = $request->jurusan;
            $pelaksanaan->subUnsur = $request->subUnsur;
            $pelaksanaan->kegiatan = $request->kegiatan;
            $pelaksanaan->idProdi = $request->kaprodi;
            $pelaksanaan->thnAjaran = $request->tahunAjaran;
            $pelaksanaan->semester = $request->semester;
            $pelaksanaan->tglMulai =$request->Tmulai;
            $pelaksanaan->tglSelesai = $request->Tselesai;
            $pelaksanaan->filePendukung = $rename;
            $pelaksanaan->penugasan = $request->penugasan;
            $pelaksanaan->dokumen = $request->dokumen;
            if ($request->subUnsur == 6) {
                $pelaksanaan->mutu = $request->mutu;
            }
            $pelaksanaan->save();
                
            $idpelaksanaan = $pelaksanaan->id;
            if ($request->subUnsur == 1) {
                $subUnsur1 = subUnsur1::create([
                    'idPelaksanaan' => $idpelaksanaan,
                    'kodeMK' => $request->kodeMK,
                    'namaMK' => $request->namaMK,
                    'jumSKS' => $request->jumSks,
                    'kelas' => $request->kelas,
                    'jumSKST' => $request->sksT,
                    'jumSKSP' =>$request->sksP
                ]);
                $idSubUnsur1 = $subUnsur1->id;
                if ($request->sksT > 4) {
                    for ($i=0; $i < $request->sksT ; $i++) {
                        $n = $i+1;
                        $sesi = sesi::create([
                            'idUnsur' => $idSubUnsur1,
                            'unsur' => $request->subUnsur,
                            'sesiKe' => $n,
                            'idDosenT' => $request['dosenT'.$n],
                            'idDosenP' => $request['dosenP'.$n]
                        ]);
                    }
                }else{
                    for ($i=0; $i < 4 ; $i++) {
                        $n = $i+1;
                        $sesi = sesi::create([
                            'idUnsur' => $idSubUnsur1,
                            'unsur' => $request->subUnsur,
                            'sesiKe' => $n,
                            'idDosenT' => $request['dosenT'.$n],
                            'idDosenP' => $request['dosenP'.$n]
                        ]);
                    }
                }
    
                // for add to count sks
                for ($i=0; $i < $request->sksT; $i++) { 
                    $n = $i+1;
                    countSks::create([
                        'pelaksanaan' => $pelaksanaan->id,
                        'sesi' => $n,
                        'dosen' => $request['dosenT'.$n],
                        'countBkd' => $request['bkdt'.$n],
                        'countSkp' => $request['skpt'.$n],
                    ]);
                }
                for ($i=0; $i < 4; $i++) { 
                    $n = $i+1;
                    countSks::create([
                        'pelaksanaan' => $pelaksanaan->id,
                        'sesi' => $n,
                        'dosen' => $request['dosenP'.$n],
                        'countBkd' => $request['bkdp'.$n],
                        'countSkp' => $request['skpp'.$n],
                    ]);
                }
                
            }elseif ($request->subUnsur == 2 || $request->subUnsur == 3) {
                $subUnsur23 = subUnsur23::create([
                    'idPelaksanaan' => $idpelaksanaan,
                    'jmlMHS' => $request->jumMhs,
                    'jmlSKS' => $request->jumSksMhs
                ]);
                $idSubUnsur23 = $subUnsur23->id;
                for ($i=0; $i < $request->countDosen ; $i++) {
                    $n = $i+1;
                    $idDosenG = $request['dosenU'.$i];
                    sesi::create([
                        'idUnsur' => $idSubUnsur23,
                        'unsur' => $request->subUnsur,
                        'sesiKe' => null,
                        'idDosenG' => $idDosenG,
                        'idDosenT' => null,
                        'idDosenP' => null
                    ]);
                    countSks::create([
                        'pelaksanaan' => $pelaksanaan->id,
                        'sesi' => $n,
                        'dosen' => $idDosenG,
                        'countBkd' => $request->jumSksMhs/$request->countDosen,
                        'countSkp' => $request->jumSksMhs/$request->countDosen,
                    ]);
                }
            }elseif ($request->subUnsur == 4) {
                subUnsur4::create([
                    'idpelaksanaan' => $idpelaksanaan,
                    'jnsBimb' => $request->jnsBim,
                    'jmlMHS' => $request->jumMhsis,
                    'jmlSKS' => 0,
                    'idDosen1' => $request->dosenPemb1,
                    'bkd1' => $request->sksSub4bkd1,
                    'skp1' => $request->sksSub4skp1,
                    'idDosen2' => $request->dosenPemb2,
                    'bkd2' => $request->sksSub4bkd2,
                    'skp2' => $request->sksSub4skp2,
                ]);
                for ($i=0; $i < 2 ; $i++) { 
                    $n = $i+1;
                    countSks::create([
                        'pelaksanaan' => $pelaksanaan->id,
                        'sesi' => $n,
                        'dosen' => $request['dosenPemb'.$n],
                        'countBkd' => $request['sksSub4bkd'.$n],
                        'countSkp' => $request['sksSub4skp'.$n],
                    ]);
                }
            }elseif ($request->subUnsur == 5) {
                subUnsur5::create([
                    'idpelaksanaan' => $idpelaksanaan,
                    'jmlMHS' => $request->jumMhsiswa,
                    'idDosenK' => $request->idDosenK,
                    'idDosenA' => $request->idDosenA
                ]);
                countSks::create([
                    'pelaksanaan' => $pelaksanaan->id,
                    'sesi' => 1,
                    'dosen' => $request->idDosenK,
                    'countBkd' => $request->bkd1,
                    'countSkp' => $request->skp1,
                ]);
                countSks::create([
                    'pelaksanaan' => $pelaksanaan->id,
                    'sesi' => 2,
                    'dosen' => $request->idDosenA,
                    'countBkd' => $request->bkd2,
                    'countSkp' => $request->skp2,
                ]);
            }elseif ($request->subUnsur == 6) {
                subUnsur6::create([
                    'idpelaksanaan' => $idpelaksanaan,
                    'idDosen' => session('userId'),
                    'jmlKeg' => $request->jumKeg,
                    'jmlSKSbkd' => $request->jumSKSU6bkd,
                    'jmlSKSskp' => $request->jumSKSU6skp
                ]);
                countSks::create([
                    'pelaksanaan' => $pelaksanaan->id,
                    'sesi' => 1,
                    'dosen' => session('userId'),
                    'countBkd' => $request->jumSKSU6bkd,
                    'countSkp' => $request->jumSKSU6skp,
                ]);
            }
            DB::commit();
            return redirect('/Pelaksanaan');
        } catch (\Throwable $e) {
            DB::rollback();
            print_r($e);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\pelaksanaan  $pelaksanaan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pelaksanaan = pelaksanaan::find($id);
        $kaprodi = kaprodi::all();
        $jurusan = jurusan::all();
        $users = DB::select('SELECT * from tbluser WHERE akses = 2 ');
        $dosen = DB::select('SELECT * FROM countsks WHERE pelaksanaan=? GROUP BY dosen',[$id]);
        $sks = DB::select('SELECT * FROM countsks WHERE pelaksanaan=?',[$id]);
        $idP = $pelaksanaan->subUnsur;
        if ($idP == 1) {
            $unsur = subUnsur1::where('idPelaksanaan', $id)->first();
            $sesi = sesi::where('idUnsur', $unsur->id)->where('unsur', 1)->get();
        } elseif ($idP == 2) {
            $unsur = subUnsur23::where('idPelaksanaan', $id)->first();
            $sesi = sesi::where('idUnsur', $unsur->id)->where('unsur', 2)->get();
        } elseif ($idP == 3) {
            $unsur = subUnsur23::where('idPelaksanaan', $id)->first();
            $sesi = sesi::where('idUnsur', $unsur->id)->where('unsur', 3)->get();
        } elseif ($idP == 4) {
            $unsur = subUnsur4::where('idPelaksanaan', $id)->first();
            $sesi = "";
        } elseif ($idP == 5) {
            $unsur = subUnsur5::where('idPelaksanaan', $id)->first();
            $sesi = "";
        } elseif ($idP == 6) {
            $unsur = subUnsur6::where('idPelaksanaan', $id)->first();
            $sesi = "";
        }else{
            $unsur = '';
            $sesi = '';
        }

        return view('pelaksanaan/details', [
            'pelaksanaan' => $pelaksanaan,
            'kaprodi' => $kaprodi,
            'jurusan' => $jurusan,
            'users' => $users,
            'unsur' => $unsur,
            'sesi' => $sesi,
            'dosen' => $dosen,
            'sks' => $sks,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\pelaksanaan  $pelaksanaan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pelaksanaan = pelaksanaan::find($id);
        $kaprodi = kaprodi::all();
        $jurusan = jurusan::all();
        $users = DB::select('SELECT * from tbluser WHERE akses = 2 ');
        $idP = $pelaksanaan->subUnsur;
        if ($idP == 1) {
            $unsur = subUnsur1::where('idPelaksanaan', $id)->first();
            $sesi = sesi::where('idUnsur', $unsur->id)->where('unsur', 1)->get();
        } elseif ($idP == 2) {
            $unsur = subUnsur23::where('idPelaksanaan', $id)->first();
            $sesi = sesi::where('idUnsur', $unsur->id)->where('unsur', 2)->get();
        } elseif ($idP == 3) {
            $unsur = subUnsur23::where('idPelaksanaan', $id)->first();
            $sesi = sesi::where('idUnsur', $unsur->id)->where('unsur', 3)->get();
        } elseif ($idP == 4) {
            $unsur = subUnsur4::where('idPelaksanaan', $id)->first();
            $sesi = "";
        } elseif ($idP == 5) {
            $unsur = subUnsur5::where('idPelaksanaan', $id)->first();
            $sesi = "";
        } elseif ($idP == 6) {
            $unsur = subUnsur6::where('idPelaksanaan', $id)->first();
            $sesi = "";
        }else{
            $unsur = '';
            $sesi = '';
        }

        return view('pelaksanaan/edit', [
            'pelaksanaan' => $pelaksanaan,
            'kaprodi' => $kaprodi,
            'jurusan' => $jurusan,
            'users' => $users,
            'unsur' => $unsur,
            'sesi' => $sesi,
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\pelaksanaan  $pelaksanaan
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $this->validate($request,[
            'kaprodi' => 'required',
            'jurusan' => 'required',
            'subUnsur' => 'required',
            'kegiatan' => 'required',
            'tahunAjaran' => 'required',
            'semester' => 'required',
            'Tmulai' => 'required',
            'Tselesai' => 'required',
        ]);
        if ($request->subUnsur == 1) {
            $this->validate($request,[
                'kodeMK' => 'required',
                'jumSks' => 'required',
                'sksT' => 'required',
                'namaMK' => 'required',
                'kelas' => 'required',
                'sksP' => 'required',
            ]);
        }
        $pelaksanaan = pelaksanaan::find($id);
        $pelaksanaan->idJurusan = $request->jurusan;
        $pelaksanaan->subUnsur = $request->subUnsur;
        $pelaksanaan->kegiatan = $request->kegiatan;
        $pelaksanaan->idProdi = $request->kaprodi;
        $pelaksanaan->thnAjaran = $request->tahunAjaran;
        $pelaksanaan->semester = $request->semester;
        $pelaksanaan->tglMulai =$request->Tmulai;
        $pelaksanaan->tglSelesai = $request->Tselesai;
        $pelaksanaan->save();
        if ($request->subUnsur == 1) {
            $subUnsur1 = subUnsur1::where('idPelaksanaan',$id)->first();
            $subUnsur1->update([
                'kodeMK' => $request->kodeMK,
                'namaMK' => $request->namaMK,
                'jumSKS' => $request->jumSks,
                'kelas' => $request->kelas,
                'jumSKST' => $request->sksT,
                'jumSKSP' =>$request->sksP,
            ]);
            $idSubUnsur1 = $subUnsur1->id;
            sesi::where('idUnsur',$idSubUnsur1)->where('unsur',$request->subUnsur)->delete();
            if ($request->sksT > 4) {
                for ($i=0; $i < $request->sksT ; $i++) {
                    $n = $i+1;
                    sesi::create([
                        'idUnsur' => $idSubUnsur1,
                        'unsur' => $request->subUnsur,
                        'sesiKe' => $n,
                        'idDosenT' => $request['dosenT'.$n],
                        'idDosenP' => $request['dosenP'.$n]
                    ]);
                }
            }else{
                for ($i=0; $i < 4 ; $i++) {
                    $n = $i+1;
                    sesi::create([
                        'idUnsur' => $idSubUnsur1,
                        'unsur' => $request->subUnsur,
                        'sesiKe' => $n,
                        'idDosenT' => $request['dosenT'.$n],
                        'idDosenP' => $request['dosenP'.$n]
                    ]);
                }
            }
            // for edit to count sks
            countSks::where('pelaksanaan',$id)->delete();
            for ($i=0; $i < $request->sksT; $i++) { 
                $n = $i+1;
                countSks::create([
                    'pelaksanaan' => $pelaksanaan->id,
                    'sesi' => $n,
                    'dosen' => $request['dosenT'.$n],
                    'countBkd' => $request['bkdt'.$n],
                    'countSkp' => $request['skpt'.$n],
                ]);
            }
            for ($i=0; $i < 4; $i++) { 
                $n = $i+1;
                countSks::create([
                    'pelaksanaan' => $pelaksanaan->id,
                    'sesi' => $n,
                    'dosen' => $request['dosenP'.$n],
                    'countBkd' => $request['bkd'.$n],
                    'countSkp' => $request['skp'.$n],
                ]);
            }
        }elseif ($request->subUnsur == 2 || $request->subUnsur == 3) {
            $subUnsur23 = subUnsur23::where('idPelaksanaan',$id)->first();
            $subUnsur23->update([
                'jmlMHS' => $request->jumMhs,
                'jmlSKS' => $request->jumSksMhs
            ]);
            $idSubUnsur23 = $subUnsur23->id;
            sesi::where('idUnsur',$idSubUnsur23)->where('unsur',$request->subUnsur)->delete();
            countSks::where('pelaksanaan',$id)->delete();
            for ($i=0; $i < $request->countDosen ; $i++) {
                $idDosenG = $request['dosenU'.$i];
                $n = $i + 1;
                sesi::create([
                    'idUnsur' => $idSubUnsur23,
                    'unsur' => $request->subUnsur,
                    'sesiKe' => null,
                    'idDosenG' => $idDosenG,
                    'idDosenT' => null,
                    'idDosenP' => null
                ]);
                countSks::create([
                    'pelaksanaan' => $pelaksanaan->id,
                    'sesi' => $n,
                    'dosen' => $idDosenG,
                    'countBkd' => $request['bkd'.$n],
                    'countSkp' => $request['skp'.$n],
                ]);
            }
        }elseif ($request->subUnsur == 4) {
            subUnsur4::where('idPelaksanaan',$id)->update([
                'jnsBimb' => $request->jnsBim,
                'jmlMHS' => $request->jumMhsis,
                'jmlSKS' => 0,
                'idDosen1' => $request->dosenPemb1,
                'bkd1' => $request->sksSub4bkd1,
                'skp1' => $request->sksSub4skp1,
                'idDosen2' => $request->dosenPemb2,
                'bkd2' => $request->sksSub4bkd2,
                'skp2' => $request->sksSub4skp2,
            ]);
            countSks::where('pelaksanaan',$id)->delete();
            for ($i=0; $i < 2 ; $i++) { 
                $n = $i+1;
                countSks::create([
                    'pelaksanaan' => $pelaksanaan->id,
                    'sesi' => $n,
                    'dosen' => $request['dosenPemb'.$n],
                    'countBkd' => $request['sksSub4bkd'.$n],
                    'countSkp' => $request['sksSub4skp'.$n],
                ]);
            }

        }elseif ($request->subUnsur == 5) {
            subUnsur5::where('idPelaksanaan',$id)->update([
                'jmlMHS' => $request->jumMhsiswa,
                'idDosenK' => $request->idDosenK,
                'idDosenA' => $request->idDosenA
            ]);
            countSks::where('pelaksanaan',$id)->delete();
            countSks::create([
                'pelaksanaan' => $pelaksanaan->id,
                'sesi' => 1,
                'dosen' => $request->idDosenK,
                'countBkd' => $request->bkd1,
                'countSkp' => $request->skp1,
            ]);
            countSks::create([
                'pelaksanaan' => $pelaksanaan->id,
                'sesi' => 2,
                'dosen' => $request->idDosenA,
                'countBkd' => $request->bkd2,
                'countSkp' => $request->skp2,
            ]);
        }elseif ($request->subUnsur == 6) {
            subUnsur6::where('idPelaksanaan',$id)->update([
                'idDosen' => session('userId'),
                'jmlKeg' => $request->jumKeg,
                'jmlSKSbkd' => $request->jumSKSU6bkd,
                'jmlSKSskp' => $request->jumSKSU6skp
            ]);
            countSks::where('pelaksanaan',$id)->delete();
            countSks::create([
                'pelaksanaan' => $pelaksanaan->id,
                'sesi' => 1,
                'dosen' => session('userId'),
                'countBkd' => $request->jumSKSU6bkd,
                'countSkp' => $request->jumSKSU6skp,
            ]);
        }

        return redirect('/Pelaksanaan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\pelaksanaan  $pelaksanaan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pelaksanaan = pelaksanaan::find($id);
        unlink('uploadFiles/'.$pelaksanaan->filePendukung);
        if ($pelaksanaan->subUnsur == 1) {
            $subUnsur1 = subUnsur1::where('idPelaksanaan',$id)->first();
            sesi::where('idUnsur',$subUnsur1->id)->where('unsur', 1)->delete();
            $subUnsur1->delete();
            countSks::where('pelaksanaan',$id)->delete();
        }elseif ($pelaksanaan->subUnsur == 2) {
            $subUnsur23 = subUnsur23::where('idPelaksanaan',$id)->first();
            sesi::where('idUnsur',$subUnsur23->id)->where('unsur', 2)->delete();
            $subUnsur23->delete();
        }elseif ($pelaksanaan->subUnsur == 3) {
            $subUnsur23 = subUnsur23::where('idPelaksanaan',$id)->first();
            sesi::where('idUnsur',$subUnsur23->id)->where('unsur', 3)->delete();
            $subUnsur23->delete();
        }elseif ($pelaksanaan->subUnsur == 4) {
            subUnsur4::where('idPelaksanaan',$id)->delete();
        }elseif ($pelaksanaan->subUnsur == 5) {
            subUnsur5::where('idPelaksanaan',$id)->delete();
        }elseif ($pelaksanaan->subUnsur == 6) {
            subUnsur6::where('idPelaksanaan',$id)->delete();
        }
        $pelaksanaan->delete();

        return redirect('/Pelaksanaan');
    }

    public function export($id, $status)
    {
        $bkd = 0;
        $skp = 0;
        $nama='';
        $subUnsur = '';
        $users = DB::select('SELECT * from tbluser WHERE akses = 2 ');
        $dosen = DB::select('SELECT * FROM countsks WHERE pelaksanaan=? GROUP BY dosen',[$id]);
        $sks = DB::select('SELECT * FROM countsks WHERE pelaksanaan=?',[$id]);
        $pelaksanaan = pelaksanaan::find($id);
        $dataArrayBkd[] = array('SUB UNSUR', 'KEGIATAN', 'NAMA DOSEN','BKD');
        $dataArraySkp[] = array('SUB UNSUR', 'KEGIATAN', 'NAMA DOSEN','SKP');
        foreach ($dosen as $value) {
            $subU = $pelaksanaan->subUnsur;
            //kita jumlahkan berdasarkan dosennya
            $sumBkd = DB::select('SELECT SUM(countBkd) as jumlah FROM countsks WHERE pelaksanaan=? AND dosen=?',[$id,$value->dosen]);
            foreach ($sumBkd as $datax) {
                $bkd = $datax->jumlah;
            }
            $sumSkp = DB::select('SELECT SUM(countSkp) as jumlah FROM countsks WHERE pelaksanaan=? AND dosen=?',[$id,$value->dosen]);
            foreach ($sumSkp as $datax) {
                $skp = $datax->jumlah;
            }
            
            //kita ambil nama dosennya
            foreach ($users as $item) {
                if ($value->dosen == $item->id) {
                    $nama = $item->nama;
                }
            }
            if ($subU == 1) {
                $subUnsur = 'Melaksanakan perkuliahan/tutorial dan membimbing';
            } else if ($subU == 2) {
                $subUnsur = 'Membimbing seminar';
            } else if ($subU == 3) {
                $subUnsur = 'Membimbing kuliah kerja nyata';
            } else if ($subU == 4) {
                $subUnsur = 'Membimbing disertasi, tesis, skripsi dan laporan akhir studi';
            } else if ($subU == 5) {
                $subUnsur = 'Bertugas sebagai penguji pada ujian akhir';
            } else if ($subU == 6) {
                $subUnsur = 'Membina kegiatan mahasiswa';
            }
            
            if ($status == 'bkd') {
                $dataArrayBkd[] = array(
                    'SUB UNSUR' => $subUnsur,
                    'KEGIATAN' => $pelaksanaan->kegiatan,
                    'NAMA DOSEN' => $nama,
                    'BKD' => $bkd 
                );
            }
            if ($status == 'skp') {
                $dataArraySkp[] = array(
                    'SUB UNSUR' => $subUnsur,
                    'KEGIATAN' => $pelaksanaan->kegiatan,
                    'NAMA DOSEN' => $nama,
                    'SKP' => $skp 
                );
            }
        }
        if ($status == 'bkd') {
            // $get = Excel::store(new PelaksanaanExport($dataArrayBkd), 'pelaksanaan-BKD.xlsx','public2' );
            // $zip = new ZipArchive;
            // $zipName = 'pelaksanaan-BKD.zip';
            // if ($zip->open('uploadFiles/'.$zipName, ZipArchive::CREATE) == TRUE) {
            //     $zip->addFile('uploadFiles/'.$pelaksanaan->filePendukung);
            //     $zip->addFile('uploadFiles/pelaksanaan-BKD.xlsx');    
            //     $zip->close();
            // }
            // unlink('uploadFiles/pelaksanaan-BKD.xlsx');
            // return response()->download('uploadFiles/'.$zipName)->deleteFileAfterSend(true);
            return Excel::download(new PelaksanaanExport($id,'bkd'), 'invoices.xlsx');
        }
        if ($status == 'skp') {
            $get = Excel::store(new PelaksanaanExport($id,'skp'), 'pelaksanaan-SKP.xlsx','public2' );
            $zip = new ZipArchive;
            $zipName = 'pelaksanaan-SKP.zip';
            if ($zip->open('uploadFiles/'.$zipName, ZipArchive::CREATE) == TRUE) {
                $zip->addFile('uploadFiles/'.$pelaksanaan->filePendukung);
                $zip->addFile('uploadFiles/pelaksanaan-SKP.xlsx');    
                $zip->close();
            }
            unlink('uploadFiles/pelaksanaan-SKP.xlsx');
            return response()->download('uploadFiles/'.$zipName)->deleteFileAfterSend(true);
        }
        
    }
}
