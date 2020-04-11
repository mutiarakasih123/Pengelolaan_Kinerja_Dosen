@extends('template')

@section('konten')
    <div style="padding-left: 300px; padding-right: 300px;">
        <div class="row mt-4">
            <div class="col-md-6"><h2>Daftar Jurusan</h2></div>
            <div class="col-md-6 text-right"><a href="javascript:void(0)" data-toggle="modal" data-target="#tambah" class="btn btn-outline-primary">Tambah Data</a></div>
        </div>
        <div class="table-responsive mt-4">
            <table class="table table-striped table-bordered" id="tableUsers">
                <thead>
                    <tr class="text-center">
                        <th style="width: 20px">#</th>
                        <th>NAMA JURUSAN</th>
                        <th>NAMA PRODI</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($jurusan as $data)
                        <tr>
                            <td class="text-center">{{ $no++ }}</td>
                            <td>{{ $data->nama_jurusan }}</td>
                            <td>{{ $data->nama_prodi }}</td>
                            <td class="text-center" style="width: 100px">
                                <a class="btn btn-outline-primary btn-sm editJurusan" href="javascript:void(0)" id="{{ $data->id }}" data-toggle="modal" data-target="#edit" role="button">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <a class="btn btn-outline-danger btn-sm" href="/Jurusan/destroy/{{ $data->id }}" role="button">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

<div id="tambah" class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Jurusan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="/Jurusan/store">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Nama Jurusan:</label>
                        <input type="text" class="form-control" id="recipient-name" name="nama_jurusan" required>
                    </div>
                    <div class="form-group">
                        <label for="idKaprodi" class="col-form-label" >Nama Kaprodi:</label>
                        <select name="idKaprodi" id="idKaprodi" class="form-control">
                            @foreach ($kaprodi as $data)
                                <option value="{{ $data->id }}">{{ $data->nama_prodi }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="edit" class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Jurusan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" id="formEditJurusan">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama_jurusan" class="col-form-label">Nama Jurusan:</label>
                        <input type="text" class="form-control" id="nama_jurusan" name="nama_jurusan" required>
                    </div>
                    <div class="form-group">
                        <label for="idKaprodiedit" class="col-form-label" >Nama Kaprodi:</label>
                        <select name="idKaprodi" id="idKaprodiedit" class="form-control">
                            @foreach ($kaprodi as $data)
                                <option value="{{ $data->id }}" id="select{{ $data->id }}">{{ $data->nama_prodi }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>