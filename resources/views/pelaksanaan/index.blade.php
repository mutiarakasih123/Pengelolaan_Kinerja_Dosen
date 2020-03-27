@extends('template')

@section('konten')
    <div class="row mt-4">
        <div class="col-md-4"><h2>Daftar Kinerja Dosen</h2></div>
    </div>
    <div class="table-responsive mt-4">
        <table class="table table-striped table-bordered" id="tableUsers">
            <thead>
                <tr class="text-center text-uppercase">
                    <th>jurusan</th>
                    <th>sub unsur</th>
                    <th>kaProdi</th>
                    <th>tahun ajaran</th>
                    <th>semeter</th>
                    <th>mulai</th>
                    <th>selesai</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pelaksanaan as $data)
                    <tr>
                        <td>{{ $data->nama_jurusan }}</td>
                        <td>{{
                                $data->subUnsur == 1 ? "Melaksanakan perkuliahan/tutorial dan membimbing" : ($data->subUnsur == 2 ? "Membimbing seminar" : ($data->subUnsur == 3 ? "Membimbing kuliah kerja nyata" : ($data->subUnsur == 4 ? "Membimbing disertasi, tesis, skripsi dan laporan akhir studi" : ($data->subUnsur == 5 ? "Bertugas sebagai penguji pada ujian akhir" : ($data->subUnsur == 6 ? "Membina kegiatan mahasiswa" : "")))))
                            }}
                        </td>
                        <td>{{ $data->nama_prodi }}</td>
                        <td class="text-center">{{ $data->thnAjaran }}</td>
                        <td class="text-center">{{ $data->semester }}</td>
                        <td class="text-center">{{ date('d F Y', strtotime($data->tglMulai)) }}</td>
                        <td class="text-center">{{date('d F Y', strtotime($data->tglSelesai)) }}</td>
                        <td class="text-center" style="width: 150px">
                            <a class="btn btn-outline-info btn-sm" href="/Pelaksanaan/show/{{ $data->idP }}" role="button">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a class="btn btn-outline-primary btn-sm" href="/Pelaksanaan/edit/{{ $data->idP }}" role="button">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            <a class="btn btn-outline-danger btn-sm" href="/Pelaksanaan/destroy/{{ $data->idP }}" role="button">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

