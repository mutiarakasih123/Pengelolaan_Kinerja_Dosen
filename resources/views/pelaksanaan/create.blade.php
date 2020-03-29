@extends('template')

@section('konten')
    <div class="card" >
        <div class="card-header"><h4>Tambah Data Kegiatan Dosen</h4></div>
        <div class="card-body" style="padding-left: 50px; padding-right: 50px">
            <form action="/Pelaksanaan/store" method="post" class="form-row" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="col-sm-6">
                    <div class="form-group row">
                        <label for="kaprodi" class="col-sm-2 col-form-label col-form-label  text-right">Kaprodi</label>
                        <div class="col-sm-10">
                            <select name="kaprodi" id="kaprodi" class="form-control @if ($errors->has('kaprodi')) is-invalid @endif">
                                <option value="">Select Kaprodi</option>
                                @foreach ($kaprodi as $data)
                                    @if (old('kaprodi') == $data->id)
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
                            <select name="jurusan" id="jurusan" class="form-control @if ($errors->has('jurusan')) is-invalid @endif">
                                <option value="">Select Jurusan</option>
                                @foreach ($jurusan as $data)
                                    @if (old('jurusan') == $data->id)
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
                            <select name="subUnsur" id="subUnsur" class="form-control @if ($errors->has('subUnsur')) is-invalid @endif">
                                <option value="">Select Sub Unsur</option>
                                @if (session('accessId') == 3)
                                    <option value="1" {{ old('subUnsur') == 1 ? "selected" : "" }}>Melaksanakan perkuliahan/tutorial dan membimbing</option>
                                    <option value="2" {{ old('subUnsur') == 2 ? "selected" : "" }}>Membimbing seminar</option>
                                    <option value="3" {{ old('subUnsur') == 3 ? "selected" : "" }}>Membimbing kuliah kerja nyata</option>
                                    <option value="4" {{ old('subUnsur') == 4 ? "selected" : "" }}>Membimbing disertasi, tesis, skripsi dan laporan akhir studi</option>
                                    <option value="5" {{ old('subUnsur') == 5 ? "selected" : "" }}>Bertugas sebagai penguji pada ujian akhir</option>
                                @endif
                                @if (session('accessId') == 2)
                                    <option value="6" {{ old('subUnsur') == 6 ? "selected" : "" }}>Membina kegiatan mahasiswa</option>
                                @endif
                            </select>
                            <div class="invalid-feedback">
                                {{ $errors->first('subUnsur')}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="kegiatan" class="col-sm-2 col-form-label text-right">Kegiatan</label>
                        <div class="col-sm-10">
                            <textarea name="kegiatan" id="kegiatan" class="form-control text-justify @if ($errors->has('kegiatan')) is-invalid @endif" rows="3" >{{ old('kegiatan') }}</textarea>
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
                                <option value="{{date('Y')-1}}/{{date('Y')}}" {{ old('tahunAjaran') == (date('Y')-1).'/'.date('Y') ? "selected" : "" }}>
                                    {{date('Y')-1}}/{{date('Y')}}
                                </option>
                                <option value="{{date('Y')}}/{{date('Y')+1}}" {{ old('tahunAjaran') == date('Y').'/'.(date('Y')+1) ? "selected" : "" }}>
                                    {{date('Y')}}/{{date('Y')+1}}
                                </option>
                                <option value="{{date('Y')+1}}/{{date('Y')+2}}" {{ old('tahunAjaran') == (date('Y')+1).'/'.(date('Y')+2) ? "selected" : "" }}>
                                    {{date('Y')+1}}/{{date('Y')+2}}
                                </option>
                                <option value="{{date('Y')+2}}/{{date('Y')+3}}" {{ old('tahunAjaran') == (date('Y')+2).'/'.(date('Y')+3) ? "selected" : "" }}>
                                    {{date('Y')+2}}/{{date('Y')+3}}
                                </option>
                                <option value="{{date('Y')+3}}/{{date('Y')+4}}" {{ old('tahunAjaran') == (date('Y')+3).'/'.(date('Y')+4) ? "selected" : "" }}>
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
                                <option value="Genap" {{ old('semester') == "Genap" ? "selected" : "" }}>Genap</option>
                                <option value="Ganjil" {{ old('semester') == "Ganjil" ? "selected" : "" }}>Ganjil</option>
                            </select>
                            <div class="invalid-feedback">
                                {{ $errors->first('semester')}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Tmulai" class="col-sm-4 col-form-label text-right">Tanggal Mulai</label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control @if ($errors->has('Tmulai')) is-invalid @endif" id="Tmulai" name="Tmulai" value="{{ old('Tmulai') }}">
                            <div class="invalid-feedback">
                                {{ $errors->first('Tmulai')}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Tselesai" class="col-sm-4 col-form-label text-right">Tanggal Selesai</label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control @if ($errors->has('Tselesai')) is-invalid @endif" id="Tselesai" name="Tselesai" value="{{ old('Tselesai') }}">
                            <div class="invalid-feedback">
                                {{ $errors->first('Tselesai')}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="filePendukung" class="col-sm-4 col-form-label text-right">File Pendukung</label>
                        <div class="col-sm-8">
                            <input type="file" class="form-control @if ($errors->has('filePendukung')) is-invalid @endif" id="filePendukung" name="filePendukung">
                            <div class="invalid-feedback">
                                {{ $errors->first('filePendukung')}}
                            </div>
                        </div>
                    </div>
                </div>

                <span class="border col-sm-12 mb-3"></span>
                {{-- for sub unsur 1 --}}
                <div class="col-sm-6 {{ old('subUnsur') == 1 ? "" : "d-none" }} " id="tempatCloneT">
                    <div class="form-group row">
                        <label for="kodeMK" class="col-sm-3 col-form-label text-right">Kode Mata kuliah</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control @if ($errors->has('kodeMK')) is-invalid @endif" id="kodeMK" name="kodeMK" value="{{ old('kodeMK') }}">
                            <div class="invalid-feedback">
                                {{ $errors->first('kodeMK')}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jumSks" class="col-sm-3 col-form-label text-right">Jumlah SKS</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control @if ($errors->has('jumSks')) is-invalid @endif" id="jumSks" name="jumSks" value="{{ old('jumSks') }}">
                            <div class="invalid-feedback">
                                {{ $errors->first('jumSks')}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="sksT" class="col-sm-3 col-form-label text-right">Jumlah SKS Teori</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control @if ($errors->has('sksT')) is-invalid @endif" id="sksT" name="sksT" value="{{ old('sksT') }}">
                            <div class="invalid-feedback">
                                {{ $errors->first('sksT')}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 {{ old('subUnsur') == 1 ? "" : "d-none" }}" id="tempatCloneP">
                    <div class="form-group row">
                        <label for="namaMK" class="col-sm-4 col-form-label text-right">Nama Mata kuliah</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control @if ($errors->has('namaMK')) is-invalid @endif" id="namaMK" name="namaMK" value="{{ old('namaMK') }}">
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
                                <option value="pagi" {{ old('kelas') == 'pagi' ? 'selected' : '' }}>pagi</option>
                                <option value="malam" {{ old('kelas') == 'malam' ? 'selected' : '' }}>Malam</option>
                            </select>
                            <div class="invalid-feedback">
                                {{ $errors->first('kelas')}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="sksP" class="col-sm-4 col-form-label text-right">Jumlah SKS Praktek</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control @if ($errors->has('sksP')) is-invalid @endif" id="sksP" name="sksP" value="{{ old('sksP') }}">
                            <div class="invalid-feedback">
                                {{ $errors->first('sksP')}}
                            </div>
                        </div>
                    </div>
                </div>

                {{-- for sub unsur 2 dan 3 --}}
                <div class="col-sm-6 {{ old('subUnsur') == 2 || old('subUnsur') == 3 ? "" : "d-none" }}" id="tempatCloneSubUnsur2">
                    <div class="form-group row">
                        <label for="jumMhs" class="col-sm-3 col-form-label text-right">Jumlah Mahasiswa</label>
                        <div class="col-sm-9">
                            <input type="number" {{ old('subUnsur') == 2 || old('subUnsur') == 3 ? "required" : "" }} class="form-control @if ($errors->has('jumMhs')) is-invalid @endif" id="jumMhs" name="jumMhs" value="{{ old('jumMhs') }}">
                            <div class="invalid-feedback">
                                {{ $errors->first('jumMhs')}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jumSksMhs" class="col-sm-3 col-form-label text-right">Jumlah SKS</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" readonly id="jumSksMhs" name="jumSksMhs" value="{{ old('jumSksMhs') }}">
                        </div>
                    </div>
                    <div class="form-group row" id="cloneDosenunsur">
                        <input type="hidden" name="countDosen" id="countDosen" value="1">
                        <label for="dosenU" class="col-sm-3 col-form-label text-right">Nama Dosen Ke 1</label>
                        <div class="col-sm-6">
                            <select class="form-control" {{ old('subUnsur') == 2 || old('subUnsur') == 3 ? "required" : "" }} name="dosenU0">
                                <option value="">Select Nama Dosen</option>
                                @foreach ($users as $data)
                                    <option value="{{ $data->id }}">{{ $data->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <a href="javascrip:void(0)" class="btn btn-info btn-sm btnplus" sum="1" style="height: 37px"><i class="fas fa-plus"></i></a>
                            <a href="javascrip:void(0)" class="btn btn-danger btn-sm d-none btnminus" id="btnminus" sum="1" style="height: 37px"><i class="fas fa-minus"></i></a>
                        </div>
                    </div>
                </div>

                {{-- for sub unsur 4 --}}
                <div class="col-sm-6 {{ old('subUnsur') == 4 ? "" : "d-none" }}" id="subUnsur4">
                    <div class="form-group row">
                        <label for="jnsBim" class="col-sm-4 col-form-label text-right">Jenis Bimbingan</label>
                        <div class="col-sm-8">
                            <select name="jnsBim" id="jnsBim" class="form-control @if ($errors->has('jnsBim')) is-invalid @endif" {{ old('subUnsur') == 4 ? "required" : "" }}>
                                <option value="">Select Jenis Bimbingan</option>
                                <option value="1">Desertasi</option>
                                <option value="2">Tesis</option>
                                <option value="3">Skripsi</option>
                            </select>
                            <div class="invalid-feedback">
                                {{ $errors->first('jnsBim')}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jumMhsis" class="col-sm-4 col-form-label text-right">Jumlah Mahasiswa</label>
                        <div class="col-sm-8">
                            <input type="number" {{ old('subUnsur') == 4 ? "required" : "" }} class="form-control @if ($errors->has('jumMhsis')) is-invalid @endif" id="jumMhsis" name="jumMhsis" value="{{ old('jumMhsis') }}">
                            <div class="invalid-feedback">
                                {{ $errors->first('jumMhsis')}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jumSKS4" class="col-sm-4 col-form-label text-right">Jumlah SKS</label>
                        <div class="col-sm-8">
                            <input type="number" readonly class="form-control @if ($errors->has('jumSKS4')) is-invalid @endif" id="jumSKS4" name="jumSKS4" value="{{ old('jumSKS4') }}">
                            <div class="invalid-feedback">
                                {{ $errors->first('jumSKS4')}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="dosenPemb1" class="col-sm-4 col-form-label text-right">Dosen Pembingbing 1</label>
                        <div class="col-sm-8">
                            <select class="form-control" {{ old('subUnsur') == 4 ? "required" : "" }} name="dosenPemb1">
                                <option value="">Select Nama Dosen</option>
                                @foreach ($users as $data)
                                    <option value="{{ $data->id }}">{{ $data->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="dosenPemb2" class="col-sm-4 col-form-label text-right">Dosen Pembingbing 2</label>
                        <div class="col-sm-8">
                            <select class="form-control" {{ old('subUnsur') == 4 ? "required" : "" }} name="dosenPemb2">
                                <option value="">Select Nama Dosen</option>
                                @foreach ($users as $data)
                                    <option value="{{ $data->id }}">{{ $data->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                {{-- for sub unsur 5 --}}
                <div class="col-sm-6 {{ old('subUnsur') == 5 ? "" : "d-none" }}" id="subUnsur5">
                    <div class="form-group row">
                        <label for="jumMhsiswa" class="col-sm-4 col-form-label text-right">Jumlah Mahasiswa</label>
                        <div class="col-sm-8">
                            <input type="number" {{ old('subUnsur') == 5 ? "required" : "" }} class="form-control @if ($errors->has('jumMhsiswa')) is-invalid @endif" id="jumMhsiswa" name="jumMhsiswa" value="{{ old('jumMhsiswa') }}">
                            <div class="invalid-feedback">
                                {{ $errors->first('jumMhsiswa')}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="idDosenK" class="col-sm-4 col-form-label text-right">Ketua Penguji</label>
                        <div class="col-sm-8">
                            <select class="form-control" {{ old('subUnsur') == 5 ? "required" : "" }} name="idDosenK">
                                <option value="">Select Nama Dosen</option>
                                @foreach ($users as $data)
                                    <option value="{{ $data->id }}">{{ $data->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="idDosenA" class="col-sm-4 col-form-label text-right">Anggota Penguji</label>
                        <div class="col-sm-8">
                            <select class="form-control" {{ old('subUnsur') == 5 ? "required" : "" }} name="idDosenA">
                                <option value="">Select Nama Dosen</option>
                                @foreach ($users as $data)
                                    <option value="{{ $data->id }}">{{ $data->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                {{-- for sub unsur 6 --}}
                <div class="col-sm-6 {{ old('subUnsur') == 6 ? "" : "d-none" }}" id="subUnsur6">
                    <div class="form-group row">
                        <label for="jumKeg" class="col-sm-4 col-form-label text-right">Jumlah Kegiatan</label>
                        <div class="col-sm-8">
                            <input type="number" {{ old('subUnsur') == 6 ? "required" : "" }} class="form-control @if ($errors->has('jumKeg')) is-invalid @endif" id="jumKeg" name="jumKeg" value="{{ old('jumKeg') }}">
                            <div class="invalid-feedback">
                                {{ $errors->first('jumKeg')}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jumSKSU6" class="col-sm-4 col-form-label text-right">Jumlah SKS</label>
                        <div class="col-sm-8">
                            <input type="number" {{ old('subUnsur') == 6 ? "required" : "" }} class="form-control @if ($errors->has('jumSKSU6')) is-invalid @endif" id="jumSKSU6" name="jumSKSU6" value="{{ old('jumSKSU6') }}">
                            <div class="invalid-feedback">
                                {{ $errors->first('jumSKSU6')}}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group text-center col-sm-12 mt-4">
                    <button type="submit" class="btn btn-success">Sumbit</button>
                    <a href="/Pelaksanaan" class="btn btn-info ml-4">Kembali</a>
                </div>
            </form>
        </div>
    </div>

    {{-- clone for sub unsur 1 --}}
    <div class="form-group row d-none" id="cloneDosenT">
        <label for="sksT" class="col-sm-3 col-form-label text-right">Nama Dosen</label>
        <div class="col-sm-9">
            <select class="form-control" {{ old('subUnsur') == 1 ? "required" : "" }} name="dosenT">
                <option value="">Select Nama Dosen</option>
                @foreach ($users as $data)
                    <option value="{{ $data->id }}" class="selectDosenT">{{ $data->nama }}</option>
                @endforeach
            </select>
            <div class="invalid-feedback"></div>
        </div>
    </div>
    <div class="form-group row d-none" id="cloneDosenP">
        <label for="sksP" class="col-sm-4 col-form-label text-right">Nama Dosen</label>
        <div class="col-sm-8">
            <select class="form-control" {{ old('subUnsur') == 1 ? "required" : "" }} name="dosenP">
                <option value="">Select Nama Dosen</option>
                @foreach ($users as $data)
                    <option value="{{ $data->id }}">{{ $data->nama }}</option>
                @endforeach
            </select>
        </div>
    </div>
    {{-- cone for sub unsur 2 --}}
@endsection

