@extends('template')

@section('konten')
    <div class="row mt-4">
        <div class="col-md-4"><h2>Daftar Kinerja Dosen</h2></div>
    </div>
    <div class="table-responsive mt-4">
        <table class="table table-striped table-bordered" id="tableUsers">
            <thead>
                <tr class="text-center text-uppercase">
                    <th class="{{ session('accessId') == 2 ? 'd-none' : '' }}">jurusan</th>
                    <th {{ session('accessId') == 3 ? 'style="width: 300px"' : '' }}>sub unsur</th>
                    <th class="{{ session('accessId') == 3 ? 'd-none' : '' }}" style="width: 600px">Kegiatan</th>
                    <th class="{{ session('accessId') == 2 ? 'd-none' : '' }}">Prodi</th>
                    <th class="{{ session('accessId') == 2 ? 'd-none' : '' }}">tahun ajaran</th>
                    <th class="{{ session('accessId') == 2 ? 'd-none' : '' }}">semeter</th>
                    <th class="{{ session('accessId') == 2 ? 'd-none' : '' }}">mulai</th>
                    <th class="{{ session('accessId') == 2 ? 'd-none' : '' }}">selesai</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pelaksanaan as $data)
                    <tr>
                        <td class="align-middle {{ session('accessId') == 2 ? 'd-none' : '' }}">{{ $data->nama_jurusan }}</td>
                        <td class="align-middle">{{
                                $data->subUnsur == 1 ? "Melaksanakan perkuliahan/tutorial dan membimbing" : ($data->subUnsur == 2 ? "Membimbing seminar" : ($data->subUnsur == 3 ? "Membimbing kuliah kerja nyata" : ($data->subUnsur == 4 ? "Membimbing disertasi, tesis, skripsi dan laporan akhir studi" : ($data->subUnsur == 5 ? "Bertugas sebagai penguji pada ujian akhir" : ($data->subUnsur == 6 ? "Membina kegiatan mahasiswa" : "")))))
                            }}
                        </td>
                        <td class="{{ session('accessId') == 3 ? 'd-none' : '' }}">{{ $data->kegiatan }}</td>
                        <td class="align-middle {{ session('accessId') == 2 ? 'd-none' : '' }}">{{ $data->nama_prodi }}</td>
                        <td class="text-center align-middle {{ session('accessId') == 2 ? 'd-none' : '' }}">{{ $data->thnAjaran }}</td>
                        <td class="text-center align-middle {{ session('accessId') == 2 ? 'd-none' : '' }}">{{ $data->semester }}</td>
                        <td class="text-center align-middle {{ session('accessId') == 2 ? 'd-none' : '' }}">{{ date('d F Y', strtotime($data->tglMulai)) }}</td>
                        <td class="text-center align-middle {{ session('accessId') == 2 ? 'd-none' : '' }}">{{date('d F Y', strtotime($data->tglSelesai)) }}</td>
                        <td class="text-center align-middle" style="width: 150px">
                            <a class="btn btn-outline-info btn-sm" href="/Pelaksanaan/show/{{ $data->idP }}" role="button">
                                <i class="fas fa-eye"></i>
                            </a>
                            @if (session('accessId') == 3 && $data->subUnsur !== 6)
                            <a class="btn btn-outline-primary btn-sm" href="/Pelaksanaan/edit/{{ $data->idP }}" role="button">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            <a class="btn btn-outline-danger btn-sm" href="/Pelaksanaan/destroy/{{ $data->idP }}" role="button">
                                <i class="fas fa-trash"></i>
                            </a>
                            @endif
                            @if (session('accessId') == 2 && $data->subUnsur == 6)
                                <a class="btn btn-outline-primary btn-sm" href="/Pelaksanaan/edit/{{ $data->idP }}" role="button">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <a class="btn btn-outline-danger btn-sm" href="/Pelaksanaan/destroy/{{ $data->idP }}" role="button">
                                    <i class="fas fa-trash"></i>
                                </a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

