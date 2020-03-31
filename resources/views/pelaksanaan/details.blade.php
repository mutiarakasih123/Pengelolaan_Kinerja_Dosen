@extends('template')

@section('konten')
    <div class="card" style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif" >
        <div class="card-header">
            <div class="row">
                <h4 class="col">Details Data Kegiatan Dosen</h4>
                <div class="col text-right">
                    <a href="/Pelaksanaan" class="btn btn-info">Kembali</a>
                </div>
            </div>
        </div>
        <div class="card-body row" style="padding-left: 50px; padding-right: 50px">
            <div class="col-sm-6">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label col-form-label text-right">Kaprodi</label>
                    @foreach ($kaprodi as $data)
                        @if ($pelaksanaan->idProdi == $data->id)
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="{{$data->nama_prodi}}" disabled>
                            </div>
                        @endif
                    @endforeach
                </div>
                <div class="form-group row">
                    <label for="jurusan" class="col-sm-2 col-form-label col-form-label  text-right">Jurusan</label>
                    <div class="col-sm-10">
                        @foreach ($jurusan as $data)
                            @if ($pelaksanaan->idJurusan == $data->id)
                                <input type="text" class="form-control" value="{{$data->nama_jurusan}}" disabled>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="form-group row">
                    <label for="subUnsur" class="col-sm-2 col-form-label col-form-label  text-right">Sub Unsur</label>
                    <div class="col-sm-10">
                        @if ($pelaksanaan->subUnsur == 1)
                            <input type="text" class="form-control" value="Melaksanakan perkuliahan/tutorial dan membimbing" disabled>
                        @endif
                        @if ($pelaksanaan->subUnsur == 2)
                            <input type="text" class="form-control" value="Membimbing seminar" disabled>
                        @endif
                        @if ($pelaksanaan->subUnsur == 3)
                            <input type="text" class="form-control" value="Membimbing kuliah kerja nyata" disabled>
                        @endif
                        @if ($pelaksanaan->subUnsur == 4)
                            <input type="text" class="form-control" value="Membimbing disertasi, tesis, skripsi dan laporan akhir studi" disabled>
                        @endif
                        @if ($pelaksanaan->subUnsur == 5)
                            <input type="text" class="form-control" value="Bertugas sebagai penguji pada ujian akhir" disabled>
                        @endif
                        @if ($pelaksanaan->subUnsur == 6)
                            <input type="text" class="form-control" value="Membina kegiatan mahasiswa" disabled>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kegiatan" class="col-sm-2 col-form-label text-right">Kegiatan</label>
                    <div class="col-sm-10">
                        <textarea id="kegiatan" class="form-control text-justify" rows="3" readonly >{{ $pelaksanaan->kegiatan }}</textarea>
                    </div>
                </div>

            </div>
            <div class="col-sm-6">
                <div class="form-group row">
                    <label for="tahunAjaran" class="col-sm-4 col-form-label text-right">Tahun Ajaran</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" value="{{$pelaksanaan->thnAjaran}}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="semester" class="col-sm-4 col-form-label text-right">Semester</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" value="{{$pelaksanaan->semester}}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Tmulai" class="col-sm-4 col-form-label text-right">Tanggal Mulai</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" value="{{date('d F Y', strtotime($pelaksanaan->tglMulai))}}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Tselesai" class="col-sm-4 col-form-label text-right">Tanggal Selesai</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" value="{{date('d F Y', strtotime($pelaksanaan->tglSelesai))}}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label text-right">File Pendukung</label>
                    <div class="col-sm-8">
                        <h3 class="col-form-label">
                            <a href="../../uploadFiles/{{ $pelaksanaan->filePendukung }}" target="_blank">
                                <span class="badge badge-primary" style="font-size: 14px">{{ $pelaksanaan->filePendukung }}</span>
                            </a>
                        </h3>
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
                        <input type="text" class="form-control" id="kodeMK" name="kodeMK" value="{{ $unsur->kodeMK }}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jumSks" class="col-sm-3 col-form-label text-right">Jumlah SKS</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="jumSks" name="jumSks" value="{{ $unsur->jumSKS }}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="sksT" class="col-sm-3 col-form-label text-right">Jumlah SKS Teori</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" id="sksT" name="sksT" value="{{ $unsur->jumSKST }}" disabled>
                    </div>
                </div>
                @foreach ($sesi as $key => $data)
                    @if ($data->idDosenT !== null)
                        <div class="form-group row">
                            <label for="sksT" class="col-sm-3 col-form-label text-right">Dosen Teori Sesi {{$key+1}}</label>
                            <div class="col-sm-6">
                                @foreach ($users as $datax)
                                    @if ($data->idDosenT == $datax->id)
                                        <input type="text" class="form-control" value="{{ $datax->nama }}" disabled>
                                    @endif
                                @endforeach
                            </div>
                            <div class="col-sm-3">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                      <div class="input-group-text">SKS</div>
                                    </div>
                                    <input type="text" class="form-control text-center" placeholder="SKS" disabled value="1">
                                  </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            <div class="col-sm-6" id="tempatCloneP">
                <div class="form-group row">
                    <label for="namaMK" class="col-sm-4 col-form-label text-right">Nama Mata kuliah</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="namaMK" name="namaMK" value="{{ $unsur->namaMK }}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kelas" class="col-sm-4 col-form-label text-right">Kelas</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" value="{{ $unsur->kelas }}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="sksP" class="col-sm-4 col-form-label text-right">Jumlah SKS Praktek</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="sksP" name="sksP" value="{{ $unsur->jumSKSP }}" disabled>
                    </div>
                </div>
                @foreach ($sesi as $key => $data)
                    @if ($data->idDosenP !== null)
                        <div class="form-group row">
                            <label for="sksT" class="col-sm-4 col-form-label text-right">Dosen Praktek Sesi {{$key+1}}</label>
                            <div class="col-sm-5">
                                @foreach ($users as $datax)
                                    @if ($data->idDosenP == $datax->id)
                                        <input type="text" class="form-control" value="{{ $datax->nama }}" disabled>
                                    @endif
                                @endforeach
                            </div>
                            <div class="col-sm-3">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                      <div class="input-group-text">SKS</div>
                                    </div>
                                    <input type="text" class="form-control text-center" placeholder="SKS" disabled value="{{ number_format($unsur->jumSKSP/4,2,'.','') }}">
                                  </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            @endif

            {{-- for sub unsur 2 dan 3 --}}
            @if ($pelaksanaan->subUnsur == 2 || $pelaksanaan->subUnsur == 3)
            <div class="col-sm-6" id="tempatCloneSubUnsur2">
                <div class="form-group row">
                    <label for="jumMhs" class="col-sm-3 col-form-label text-right">Jumlah Mahasiswa</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" id="jumMhs" name="jumMhs" value="{{ $unsur->jmlMHS }}" disabled>
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
                    <div class="col-sm-6">
                        @foreach ($users as $data)
                            @if ($item->idDosenG == $data->id)
                                <input type="text" class="form-control" value="{{$data->nama}}" disabled>
                            @endif
                        @endforeach
                    </div>
                    <div class="col-sm-3">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                              <div class="input-group-text">SKS</div>
                            </div>
                            <input type="text" class="form-control text-center sksSub2" placeholder="SKS" readonly value="{{ number_format($unsur->jmlSKS/count($sesi),2,'.','') }}">
                          </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endif

            {{-- for sub unsur 4 --}}
            @if ($pelaksanaan->subUnsur == 4)
            <div class="col-sm-6" id="subUnsur4">
                <div class="form-group row">
                    <label for="jnsBim" class="col-sm-4 col-form-label text-right">Jenis Bimbingan</label>
                    <div class="col-sm-8">
                        @if ($unsur->jnsBimb == 1)
                            <input type="text" class="form-control" value="Desertasi" disabled>
                        @endif
                        @if ($unsur->jnsBimb == 2)
                            <input type="text" class="form-control" value="Tesis" disabled>
                        @endif
                        @if ($unsur->jnsBimb == 3)
                            <input type="text" class="form-control" value="Skripsi" disabled>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jumMhsis" class="col-sm-4 col-form-label text-right">Jumlah Mahasiswa</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="jumMhsis" name="jumMhsis" value="{{ $unsur->jmlMHS }}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jumSKS4" class="col-sm-4 col-form-label text-right">Jumlah SKS</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="jumSKS4" name="jumSKS4" value="{{ $unsur->jmlSKS }}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="dosenPemb1" class="col-sm-4 col-form-label text-right">Dosen Pembimbing 1</label>
                    <div class="col-sm-5">
                        @foreach ($users as $data)
                            @if ($unsur->idDosen1 == $data->id)
                                <input type="text" class="form-control" value="{{ $data->nama }}" disabled>
                            @endif
                        @endforeach
                    </div>
                    <div class="col-sm-3">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                              <div class="input-group-text">SKS</div>
                            </div>
                            <input type="text" class="form-control text-center sksSub4" placeholder="SKS" readonly value="{{ $unsur->jmlSKS/2 }}">
                          </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="dosenPemb2" class="col-sm-4 col-form-label text-right">Dosen Pembimbing 2</label>
                    <div class="col-sm-5">
                        @foreach ($users as $data)
                            @if ($unsur->idDosen2 == $data->id)
                                <input type="text" class="form-control" value="{{ $data->nama }}" disabled>
                            @endif
                        @endforeach
                    </div>
                    <div class="col-sm-3">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                              <div class="input-group-text">SKS</div>
                            </div>
                            <input type="text" class="form-control text-center sksSub4" placeholder="SKS" readonly value="{{ $unsur->jmlSKS/2 }}">
                          </div>
                    </div>
                </div>
            </div>
            @endif

            {{-- for sub unsur 5 --}}
            @if ($pelaksanaan->subUnsur == 5)
            <div class="col-sm-6" id="subUnsur5">
                <div class="form-group row">
                    <label for="jumMhsiswa" class="col-sm-4 col-form-label text-right">Jumlah Mahasiswa</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="jumMhsiswa" name="jumMhsiswa" value="{{ $unsur->jmlMHS }}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="idDosenK" class="col-sm-4 col-form-label text-right">Ketua Penguji</label>
                    <div class="col-sm-5">
                        @foreach ($users as $data)
                            @if ($unsur->idDosenK == $data->id)
                                <input type="text" class="form-control" value="{{ $data->nama }}" disabled>
                            @endif
                        @endforeach
                    </div>
                    <div class="col-sm-3">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                              <div class="input-group-text">SKS</div>
                            </div>
                            <input type="text" class="form-control text-center sksSub5K" placeholder="SKS" readonly value="{{ $unsur->jmlMHS/4 }}">
                          </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="idDosenA" class="col-sm-4 col-form-label text-right">Anggota Penguji</label>
                    <div class="col-sm-5">
                        @foreach ($users as $data)
                            @if ($unsur->idDosenA == $data->id)
                                <input type="text" class="form-control" value="{{ $data->nama }}" disabled>
                            @endif
                        @endforeach
                    </div>
                    <div class="col-sm-3">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                              <div class="input-group-text">SKS</div>
                            </div>
                            <input type="text" class="form-control text-center sksSub5A" placeholder="SKS" readonly value="{{ ($unsur->jmlMHS/4)*0.5 }}">
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
                        <input type="number" required class="form-control" id="jumKeg" name="jumKeg" value="{{ $unsur->jmlKeg }}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jumSKSU6" class="col-sm-4 col-form-label text-right">Jumlah SKS</label>
                    <div class="col-sm-8">
                        <input type="number" required class="form-control" id="jumSKSU6" name="jumSKSU6" value="{{ $unsur->jmlSKS }}" disabled>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
@endsection

