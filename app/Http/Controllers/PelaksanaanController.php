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
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

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
        $pelaksanaan = pelaksanaan::create([
            'idJurusan' => $request->jurusan,
            'subUnsur' => $request->subUnsur,
            'kegiatan' => $request->kegiatan,
            'idProdi' => $request->kaprodi,
            'thnAjaran' => $request->tahunAjaran,
            'semester' => $request->semester,
            'tglMulai' =>$request->Tmulai,
            'tglSelesai' => $request->Tselesai,
            'filePendukung' => $rename
        ]);
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
        }elseif ($request->subUnsur == 2 || $request->subUnsur == 3) {
            $subUnsur23 = subUnsur23::create([
                'idPelaksanaan' => $idpelaksanaan,
                'jmlMHS' => $request->jumMhs,
                'jmlSKS' => $request->jumSksMhs
            ]);
            $idSubUnsur23 = $subUnsur23->id;
            for ($i=0; $i < $request->countDosen ; $i++) {
                $sesi = sesi::create([
                    'idUnsur' => $idSubUnsur23,
                    'unsur' => $request->subUnsur,
                    'sesiKe' => null,
                    'idDosenG' => $request['dosenU'.$i],
                    'idDosenT' => null,
                    'idDosenP' => null
                ]);
            }
        }elseif ($request->subUnsur == 4) {
            subUnsur4::create([
                'idpelaksanaan' => $idpelaksanaan,
                'jnsBimb' => $request->jnsBim,
                'jmlMHS' => $request->jumMhsis,
                'jmlSKS' => $request->jumSKS4,
                'idDosen1' => $request->dosenPemb1,
                'idDosen2' => $request->dosenPemb2,
            ]);
        }elseif ($request->subUnsur == 5) {
            subUnsur5::create([
                'idpelaksanaan' => $idpelaksanaan,
                'jmlMHS' => $request->jumMhsiswa,
                'idDosenK' => $request->idDosenK,
                'idDosenA' => $request->idDosenA
            ]);
        }elseif ($request->subUnsur == 6) {
            subUnsur6::create([
                'idpelaksanaan' => $idpelaksanaan,
                'idDosen' => session('userId'),
                'jmlKeg' => $request->jumKeg,
                'jmlSKS' => $request->jumSKSU6
            ]);
        }
        return redirect('/Pelaksanaan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\pelaksanaan  $pelaksanaan
     * @return \Illuminate\Http\Response
     */
    public function show(pelaksanaan $pelaksanaan)
    {
        //
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
        return view('pelaksanaan/edit', ['pelaksanaan' => $pelaksanaan, 'kaprodi' => $kaprodi, 'jurusan' => $jurusan, 'users' => $users]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\pelaksanaan  $pelaksanaan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pelaksanaan $pelaksanaan)
    {
        //
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
        $pelaksanaan->delete();
        subUnsur1::where('idPelaksanaan',$id)->delete();
        subUnsur23::where('idPelaksanaan',$id)->delete();
        subUnsur4::where('idPelaksanaan',$id)->delete();
        subUnsur5::where('idPelaksanaan',$id)->delete();
        subUnsur6::where('idPelaksanaan',$id)->delete();

        return redirect('/Pelaksanaan');
    }
}
