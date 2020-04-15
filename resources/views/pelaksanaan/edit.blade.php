@extends('template')

@section('konten')
    <div class="card" >
        <div class="card-header"><h4>Edit Data Kegiatan Dosen</h4></div>
        <div class="card-body" style="padding-left: 50px; padding-right: 50px">
            <form action="/Pelaksanaan/update/{{ $pelaksanaan->id }}" method="post" class="form-row">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="col-sm-6">
                    <div class="form-group row">
                        <label for="kaprodi" class="col-sm-2 col-form-label col-form-label  text-right">Prodi</label>
                        <div class="col-sm-10">
                            <input type="hidden" name="kaprodi" id="kaprodiSend">
                            <select disabled id="kaprodi" class="form-control @if ($errors->has('kaprodi')) is-invalid @endif">
                                <option value="">Select Kaprodi</option>
                                @foreach ($kaprodi as $data)
                                    @if ($pelaksanaan->idProdi == $data->id)
                                        <option value="{{ $data->id }}" selected>{{ $data->nama_prodi }}</option>
                                    @else
                                        <option value="{{ $data->id }}">{{ $data->nama_prodi }}</option>
                                    @endif
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                {{ $errors->first('kaprodi')}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jurusan" class="col-sm-2 col-form-label col-form-label  text-right">Jurusan</label>
                        <div class="col-sm-10">
                            <input type="hidden" name="jurusan" id="jurusanSend">
                            <select disabled id="jurusan" class="form-control @if ($errors->has('jurusan')) is-invalid @endif">
                                <option value="">Select Jurusan</option>
                                @foreach ($jurusan as $data)
                                    @if ($pelaksanaan->idJurusan == $data->id)
                                        <option value="{{ $data->id }}" selected class="Sjur{{ $data->idKaprodi }} d-none hideJur">{{ $data->nama_jurusan }}</option>
                                    @else
                                        <option value="{{ $data->id }}" class="Sjur{{ $data->idKaprodi }} d-none hideJur">{{ $data->nama_jurusan }}</option>
                                    @endif
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                {{ $errors->first('jurusan')}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="subUnsur" class="col-sm-2 col-form-label col-form-label  text-right">Sub Unsur</label>
                        <div class="col-sm-10">
                            <input type="hidden" name="subUnsur" value="{{ $pelaksanaan->subUnsur }}">
                            <select name="subUnsur1" id="subUnsur" class="form-control" disabled>
                                <option value="">Select Sub Unsur</option>
                                @if (session('accessId') == 3)
                                    <option value="1" {{ $pelaksanaan->subUnsur == 1 ? "selected" : "" }}>Melaksanakan perkuliahan/tutorial dan membimbing</option>
                                    <option value="2" {{ $pelaksanaan->subUnsur == 2 ? "selected" : "" }}>Membimbing seminar</option>
                                    <option value="3" {{ $pelaksanaan->subUnsur == 3 ? "selected" : "" }}>Membimbing kuliah kerja nyata</option>
                                    <option value="4" {{ $pelaksanaan->subUnsur == 4 ? "selected" : "" }}>Membimbing disertasi, tesis, skripsi dan laporan akhir studi</option>
                                    <option value="5" {{ $pelaksanaan->subUnsur == 5 ? "selected" : "" }}>Bertugas sebagai penguji pada ujian akhir</option>
                                @endif
                                @if (session('accessId') == 2)
                                    <option value="6" {{ $pelaksanaan->subUnsur == 6 ? "selected" : "" }}>Membina kegiatan mahasiswa</option>
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="kegiatan" class="col-sm-2 col-form-label text-right">Kegiatan</label>
                        <div class="col-sm-10">
                            <textarea name="kegiatan" id="kegiatan" class="form-control text-justify @if ($errors->has('kegiatan')) is-invalid @endif" rows="3" >{{ $pelaksanaan->kegiatan }}</textarea>
                            <div class="invalid-feedback">
                                {{ $errors->first('kegiatan')}}
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-sm-6">
                    <div class="form-group row">
                        <label for="tahunAjaran" class="col-sm-4 col-form-label text-right">Tahun Ajaran</label>
                        <div class="col-sm-8">
                            <select class="form-control @if ($errors->has('tahunAjaran')) is-invalid @endif" id="tahunAjaran" name="tahunAjaran">
                                <option value="">Select Tahun Ajaran</option>
                                <option value="{{date('Y')-1}}/{{date('Y')}}" {{ $pelaksanaan->thnAjaran == (date('Y')-1).'/'.date('Y') ? "selected" : "" }}>
                                    {{date('Y')-1}}/{{date('Y')}}
                                </option>
                                <option value="{{date('Y')}}/{{date('Y')+1}}" {{ $pelaksanaan->thnAjaran == date('Y').'/'.(date('Y')+1) ? "selected" : "" }}>
                                    {{date('Y')}}/{{date('Y')+1}}
                                </option>
                                <option value="{{date('Y')+1}}/{{date('Y')+2}}" {{ $pelaksanaan->thnAjaran == (date('Y')+1).'/'.(date('Y')+2) ? "selected" : "" }}>
                                    {{date('Y')+1}}/{{date('Y')+2}}
                                </option>
                                <option value="{{date('Y')+2}}/{{date('Y')+3}}" {{ $pelaksanaan->thnAjaran == (date('Y')+2).'/'.(date('Y')+3) ? "selected" : "" }}>
                                    {{date('Y')+2}}/{{date('Y')+3}}
                                </option>
                                <option value="{{date('Y')+3}}/{{date('Y')+4}}" {{ $pelaksanaan->thnAjaran == (date('Y')+3).'/'.(date('Y')+4) ? "selected" : "" }}>
                                    {{date('Y')+3}}/{{date('Y')+4}}
                                </option>
                            </select>
                            <div class="invalid-feedback">
                                {{ $errors->first('tahunAjaran')}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="semester" class="col-sm-4 col-form-label text-right">Semester</label>
                        <div class="col-sm-8">
                            <select class="form-control @if ($errors->has('semester')) is-invalid @endif" id="semester" name="semester">
                                <option value="">Select Semeter</option>
                                <option value="Genap" {{ $pelaksanaan->semester == "Genap" ? "selected" : "" }}>Genap</option>
                                <option value="Ganjil" {{ $pelaksanaan->semester == "Ganjil" ? "selected" : "" }}>Ganjil</option>
                            </select>
                            <div class="invalid-feedback">
                                {{ $errors->first('semester')}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Tmulai" class="col-sm-4 col-form-label text-right">Tanggal Mulai</label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control @if ($errors->has('Tmulai')) is-invalid @endif" id="Tmulai" name="Tmulai" value="{{ date('Y-m-d', strtotime($pelaksanaan->tglMulai)) }}">
                            <div class="invalid-feedback">
                                {{ $errors->first('Tmulai')}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Tselesai" class="col-sm-4 col-form-label text-right">Tanggal Selesai</label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control @if ($errors->has('Tselesai')) is-invalid @endif" id="Tselesai" name="Tselesai" value="{{ date('Y-m-d', strtotime($pelaksanaan->tglSelesai)) }}">
                            <div class="invalid-feedback">
                                {{ $errors->first('Tselesai')}}
                            </div>
                        </div>
                    </div>
                </div>

                <span class="border col-sm-12 mb-3"></span>
                {{-- for sub unsur 1 --}}
                @if ($pelaksanaan->subUnsur == 1)
                <div class="col-sm-6" id="tempatCloneT">
                    <div class="form-group row">
                        <label for="kodeMK" class="col-sm-3 col-form-label text-right">Kode Mata kuliah</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control @if ($errors->has('kodeMK')) is-invalid @endif" id="kodeMK" name="kodeMK" value="{{ $unsur->kodeMK }}">
                            <div class="invalid-feedback">
                                {{ $errors->first('kodeMK')}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jumSks" class="col-sm-3 col-form-label text-right">Jumlah SKS</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control @if ($errors->has('jumSks')) is-invalid @endif" id="jumSks" name="jumSks" value="{{ $unsur->jumSKS }}">
                            <div class="invalid-feedback">
                                {{ $errors->first('jumSks')}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="sksT" class="col-sm-3 col-form-label text-right">Jumlah SKS Teori</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control @if ($errors->has('sksT')) is-invalid @endif" id="sksT" name="sksT" value="{{ $unsur->jumSKST }}">
                            <div class="invalid-feedback">
                                {{ $errors->first('sksT')}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6" id="tempatCloneP">
                    <div class="form-group row">
                        <label for="namaMK" class="col-sm-4 col-form-label text-right">Nama Mata kuliah</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control @if ($errors->has('namaMK')) is-invalid @endif" id="namaMK" name="namaMK" value="{{ $unsur->namaMK }}">
                            <div class="invalid-feedback">
                                {{ $errors->first('namaMK')}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="kelas" class="col-sm-4 col-form-label text-right">Kelas</label>
                        <div class="col-sm-8">
                            <select class="form-control @if ($errors->has('kelas')) is-invalid @endif" id="kelas" name="kelas">
                                <option value="">Select Kelas</option>
                                <option value="pagi" {{ $unsur->kelas == 'pagi' ? 'selected' : '' }}>pagi</option>
                                <option value="malam" {{ $unsur->kelas == 'malam' ? 'selected' : '' }}>Malam</option>
                            </select>
                            <div class="invalid-feedback">
                                {{ $errors->first('kelas')}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="sksP" class="col-sm-4 col-form-label text-right">Jumlah SKS Praktek</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control @if ($errors->has('sksP')) is-invalid @endif" id="sksP" name="sksP" value="{{ $unsur->jumSKSP }}">
                            <div class="invalid-feedback">
                                {{ $errors->first('sksP')}}
                            </div>
                        </div>
                    </div>
                </div>
                @foreach ($sesi as $key => $data)
                <div class="d-none" id="sesiKe{{$key}}" sesi="{{ $data->sesiKe }}" idDosenT="{{ $data->idDosenT }}" idDosenP="{{ $data->idDosenP }}">tes</div>
                @endforeach
                @endif

                {{-- for sub unsur 2 dan 3 --}}
                @if ($pelaksanaan->subUnsur == 2 || $pelaksanaan->subUnsur == 3)
                <div class="col-sm-8" id="tempatCloneSubUnsur2">
                    <div class="form-group row">
                        <label for="jumMhs" class="col-sm-3 col-form-label text-right">Jumlah Mahasiswa</label>
                        <div class="col-sm-9">
                            <input type="number" required class="form-control @if ($errors->has('jumMhs')) is-invalid @endif" id="jumMhs" name="jumMhs" value="{{ $unsur->jmlMHS }}">
                            <div class="invalid-feedback">
                                {{ $errors->first('jumMhs')}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jumSksMhs" class="col-sm-3 col-form-label text-right">Jumlah SKS</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" readonly id="jumSksMhs" name="jumSksMhs" value="{{ $unsur->jmlSKS }}">
                        </div>
                    </div>
                    <input type="hidden" name="countDosen" id="countDosen" value="{{ count($sesi) }}">
                    @foreach ($sesi as $key => $item)
                    <div class="form-group row" id="cloneDosenunsur{{ $key+1}}">
                        <label for="dosenU" class="col-sm-3 col-form-label text-right">Nama Dosen Ke {{ $key+1 }}</label>
                        <div class="col-sm-4">
                            <select class="form-control" required name="dosenU{{ $key }}">
                                <option value="">Select Nama Dosen</option>
                                @foreach ($users as $data)
                                    <option value="{{ $data->id }}"{{ $item->idDosenG == $data->id ? "selected" : "" }}>{{ $data->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text" style="font-size: 10px; font-family: 'Times New Roman', Times, serif">
                                      BKD SKS
                                    </div>
                                </div>
                                <input type="text" class="form-control text-center sksSub2bkd" name="bkd{{ $key+1}}" readonly value="{{ number_format($unsur->jmlSKS/count($sesi),2,'.','') }}" >
                            </div>
                        </div>
                        <div class="col">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text" style="font-size: 10px; font-family: 'Times New Roman', Times, serif">
                                      SKP SKS
                                    </div>
                                </div>
                                <input type="text" class="form-control text-center sksSub2skp" name="skp{{ $key+1}}" readonly value="{{ number_format($unsur->jmlSKS/count($sesi),2,'.','') }}">
                            </div>
                        </div>
                        <div>
                            @if (($key+1) == 1)
                            <a href="javascrip:void(0)" class="btn btn-info btn-sm btnplusEdit" sum="{{ count($sesi) }}" style="height: 37px">
                                <i class="fas fa-plus"></i>
                            </a>
                            @endif
                            @if (count($sesi) > 1 && ($key+1) == count($sesi))
                            <a href="javascrip:void(0)" class="btn btn-danger btn-sm btnminus" id="remove{{ $key+1 }}" minus="{{ $key+1 }}" sum="{{ count($sesi) }}" style="height: 37px"><i class="fas fa-minus"></i></a>
                            @else
                            <a href="javascrip:void(0)" class="btn btn-danger btn-sm d-none btnminus" id="remove{{ $key+1 }}" minus="{{ $key+1 }}" sum="{{ count($sesi) }}" style="height: 37px"><i class="fas fa-minus"></i></a>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif

                {{-- for sub unsur 4 --}}
                @if ($pelaksanaan->subUnsur == 4)
                <div class="col-sm-8" id="subUnsur4">
                    <div class="form-group row">
                        <label for="jnsBim" class="col-sm-3 col-form-label text-right">Jenis Bimbingan</label>
                        <div class="col-sm-9">
                            <select name="jnsBim" id="jnsBim" class="form-control @if ($errors->has('jnsBim')) is-invalid @endif" required>
                                <option value="">Select Jenis Bimbingan</option>
                                <option value="1" {{ $unsur->jnsBimb == 1 ? "selected" : "" }}>Desertasi</option>
                                <option value="2" {{ $unsur->jnsBimb == 2 ? "selected" : "" }}>Tesis</option>
                                <option value="3" {{ $unsur->jnsBimb == 3 ? "selected" : "" }}>Skripsi</option>
                                <option value="4" {{ $unsur->jnsBimb == 4 ? "selected" : "" }}>Laporan Akhir</option>
                            </select>
                            <div class="invalid-feedback">
                                {{ $errors->first('jnsBim')}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jumMhsis" class="col-sm-3 col-form-label text-right">Jumlah Mahasiswa</label>
                        <div class="col-sm-9">
                            <input type="number" required class="form-control @if ($errors->has('jumMhsis')) is-invalid @endif" id="jumMhsis" name="jumMhsis" value="{{ $unsur->jmlMHS }}">
                            <div class="invalid-feedback">
                                {{ $errors->first('jumMhsis')}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="dosenPemb1" class="col-sm-3 col-form-label text-right">Pembimbing Utama</label>
                        <div class="col-sm-4">
                            <select class="form-control" required name="dosenPemb1">
                                <option value="">Select Nama Dosen</option>
                                @foreach ($users as $data)
                                    <option value="{{ $data->id }}" {{ $unsur->idDosen1 == $data->id ? "selected" : "" }}>{{ $data->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text" style="font-size: 10px; font-family: 'Times New Roman', Times, serif">
                                      BKD SKS
                                    </div>
                                </div>
                                <input type="text" class="form-control text-center sksSub4bkd1" placeholder="0" readonly value="{{ $unsur->bkd1 }}" name="sksSub4bkd1">
                            </div>
                        </div>
                        <div class="col">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text" style="font-size: 10px; font-family: 'Times New Roman', Times, serif">
                                      SKP SKS
                                    </div>
                                </div>
                                <input type="text" class="form-control text-center sksSub4skp1" placeholder="0" readonly value="{{ $unsur->skp1 }}" name="sksSub4skp1">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="dosenPemb2" class="col-sm-3 col-form-label text-right">Dosen Pembimbing 2</label>
                        <div class="col-sm-4">
                            <select class="form-control" required name="dosenPemb2">
                                <option value="">Select Nama Dosen</option>
                                @foreach ($users as $data)
                                    <option value="{{ $data->id }}" {{ $unsur->idDosen2 == $data->id ? "selected" : "" }}>{{ $data->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text" style="font-size: 10px; font-family: 'Times New Roman', Times, serif">
                                        BKD SKS
                                    </div>
                                </div>
                                <input type="text" class="form-control text-center sksSub4bkd2" placeholder="0" readonly value="{{ $unsur->bkd2 }}" name="sksSub4bkd2">
                            </div>
                        </div>
                        <div class="col">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text" style="font-size: 10px; font-family: 'Times New Roman', Times, serif">
                                        SKP SKS
                                    </div>
                                </div>
                                <input type="text" class="form-control text-center sksSub4skp2" placeholder="0" readonly value="{{ $unsur->skp2 }}" name="sksSub4skp2">
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                {{-- for sub unsur 5 --}}
                @if ($pelaksanaan->subUnsur == 5)
                <div class="col-sm-8" id="subUnsur5">
                    <div class="form-group row">
                        <label for="jumMhsiswa" class="col-sm-3 col-form-label text-right">Jumlah Mahasiswa</label>
                        <div class="col-sm-9">
                            <input type="number" required class="form-control @if ($errors->has('jumMhsiswa')) is-invalid @endif" id="jumMhsiswa" name="jumMhsiswa" value="{{ $unsur->jmlMHS }}">
                            <div class="invalid-feedback">
                                {{ $errors->first('jumMhsiswa')}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="idDosenK" class="col-sm-3 col-form-label text-right">Ketua Penguji</label>
                        <div class="col-sm-4">
                            <select class="form-control" required name="idDosenK">
                                <option value="">Select Nama Dosen</option>
                                @foreach ($users as $data)
                                    <option value="{{ $data->id }}" {{ $unsur->idDosenK == $data->id ? "selected" : "" }}>{{ $data->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text" style="font-size: 10px; font-family: 'Times New Roman', Times, serif">
                                        BKD SKS
                                    </div>
                                </div>
                                <input type="text" class="form-control text-center sksSub5K" placeholder="SKS" readonly value="{{ $unsur->jmlMHS/4 }}" name="bkd1">
                            </div>
                        </div>
                        <div class="col">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text" style="font-size: 10px; font-family: 'Times New Roman', Times, serif">
                                        SKP SKS
                                    </div>
                                </div>
                                <input type="text" class="form-control text-center sksSub5K" placeholder="SKS" readonly value="{{ $unsur->jmlMHS/4 }}" name="skp1">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="idDosenA" class="col-sm-3 col-form-label text-right">Anggota Penguji</label>
                        <div class="col-sm-4">
                            <select class="form-control" required name="idDosenA">
                                <option value="">Select Nama Dosen</option>
                                @foreach ($users as $data)
                                    <option value="{{ $data->id }}" {{ $unsur->idDosenA == $data->id ? "selected" : "" }}>{{ $data->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text" style="font-size: 10px; font-family: 'Times New Roman', Times, serif">
                                        BKD SKS
                                    </div>
                                </div>
                                <input type="text" class="form-control text-center sksSub5A" placeholder="SKS" readonly value="{{ ($unsur->jmlMHS/4)*0.5 }}" name="bkd2">
                            </div>
                        </div>
                        <div class="col">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text" style="font-size: 10px; font-family: 'Times New Roman', Times, serif">
                                        SKP SKS
                                    </div>
                                </div>
                                <input type="text" class="form-control text-center sksSub5A" placeholder="SKS" readonly value="{{ ($unsur->jmlMHS/4)*0.5 }}" name="skp2">
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                {{-- for sub unsur 6 --}}
                @if ($pelaksanaan->subUnsur == 6)
                <div class="col-sm-6" id="subUnsur6">
                    <div class="form-group row">
                        <label for="jumKeg" class="col-sm-4 col-form-label text-right">Jumlah Kegiatan</label>
                        <div class="col-sm-8">
                            <input type="number" required class="form-control @if ($errors->has('jumKeg')) is-invalid @endif" id="jumKeg" name="jumKeg" value="{{ $unsur->jmlKeg }}">
                            <div class="invalid-feedback">
                                {{ $errors->first('jumKeg')}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jumSKSU6bkd" class="col-sm-4 col-form-label text-right">Jumlah SKS BKD</label>
                        <div class="col-sm-8">
                            <input type="number" required class="form-control @if ($errors->has('jumSKSU6')) is-invalid @endif" id="jumSKSU6bkd" name="jumSKSU6bkd" value="{{ $unsur->jmlSKSbkd }}">
                            <div class="invalid-feedback">
                                {{ $errors->first('jumSKSU6')}}
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="jumSKSU6skp" class="col-sm-4 col-form-label text-right">Jumlah SKS SKP</label>
                        <div class="col-sm-8">
                            <input type="number" required class="form-control @if ($errors->has('jumSKSU6')) is-invalid @endif" id="jumSKSU6skp" name="jumSKSU6skp" value="{{ $unsur->jmlSKSskp }}">
                            <div class="invalid-feedback">
                                {{ $errors->first('jumSKSU6')}}
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                <div class="form-group text-center col-sm-12 mt-4">
                    <button type="submit" class="btn btn-success">Sumbit</button>
                    <a href="/Pelaksanaan" class="btn btn-info ml-4">Kembali</a>
                </div>
            </form>
        </div>
    </div>

    {{-- clone for sub unsur 1 --}}
    <div class="form-group row d-none" id="cloneDosenT">
        <label for="sksT" class="col col-form-label text-right label">Nama Dosen</label>
        <div class="col">
            <select class="form-control cekJakademit" {{ old('subUnsur') == 1 ? "required" : "" }} name="dosenT" >
                <option value="">Select Nama Dosen</option>
                @foreach ($users as $data)
                    <option value="{{ $data->id }}" class="selectDosenT" jakademi="{{ $data->jakademi }}">{{ $data->nama }}</option>
                @endforeach
            </select>
            <div class="invalid-feedback"></div>
        </div>
        <div class="col">
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <div class="input-group-text" style="font-size: 10px; font-family: 'Times New Roman', Times, serif">BKD SKS</div>
                </div>
                <input type="text" class="form-control text-center bkd" placeholder="SKS" readonly value="0" name="bkd">
            </div>
        </div>
        <div class="col">
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <div class="input-group-text" style="font-size: 10px; font-family: 'Times New Roman', Times, serif">SKP SKS</div>
                </div>
                <input type="text" class="form-control text-center skp" placeholder="SKS" readonly value="0" name="skp">
            </div>
        </div>
    </div>
    <div class="form-group row d-none" id="cloneDosenP">
        <label for="sksP" class="col col-form-label text-right label">Nama Dosen</label>
        <div class="col">
            <select class="form-control cekJakademip" {{ old('subUnsur') == 1 ? "required" : "" }} name="dosenP">
                <option value="">Select Nama Dosen</option>
                @foreach ($users as $data)
                    <option value="{{ $data->id }}" jakademi="{{ $data->jakademi }}">{{ $data->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="col">
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <div class="input-group-text" style="font-size: 10px; font-family: 'Times New Roman', Times, serif">BKD SKS</div>
                </div>
                <input type="text" class="form-control text-center sumSKSPbkd" readonly value="0">
            </div>
        </div>
        <div class="col">
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <div class="input-group-text" style="font-size: 10px; font-family: 'Times New Roman', Times, serif">SKP SKS</div>
                </div>
                <input type="text" class="form-control text-center sumSKSPskp" readonly value="0">
            </div>
        </div>
    </div>
@endsection

