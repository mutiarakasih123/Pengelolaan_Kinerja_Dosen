@extends('template')

@section('konten')
    <div class="row mt-4">
        <div class="col-md-4"><h2>Daftar Users</h2></div>
        <div class="col-md-4 offset-md-4 text-right"><a href="users/create" class="btn btn-outline-primary">Tambah Data</a></div>
    </div>
    <div class="table-responsive mt-4">
        <table class="table table-striped table-bordered" id="tableUsers">
            <thead>
                <tr class="text-center">
                    <th>NAMA</th>
                    <th>NIP</th>
                    <th>JABATAN</th>
                    <th>JURUSAN</th>
                    <th>PRODI</th>
                    <th>EMAIL</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $data)
                    <tr>
                        <td>{{ $data->nama }}</td>
                        <td>{{ $data->nip }}</td>
                        <td>{{ $data->jabatan }}</td>
                        <td>{{ $data->jurusan }}</td>
                        <td>{{ $data->prodi }}</td>
                        <td>{{ $data->email }}</td>
                        <td class="text-center" style="width: 150px">
                            <a class="btn btn-outline-info btn-sm" href="/users/show/{{ $data->id }}" role="button">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a class="btn btn-outline-primary btn-sm" href="/users/edit/{{ $data->id }}" role="button">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            <a class="btn btn-outline-danger btn-sm" href="/users/destroy/{{ $data->id }}" role="button">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

