@extends('template')

@section('konten')
    <div class="mt-4" style="padding-left: 200px; padding-right: 200px">
        <div class="card" >
            <div class="card-header"><h4>Details Data Users</h4></div>
            <div class="card-body" style="padding-left: 50px; padding-right: 50px">
                <div class="form-group row">
                    <label for="nama" class="col-sm-2 col-form-label col-form-label  text-right">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama" readonly value="{{ $users->nama }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label text-right">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" readonly value="{{ $users->email }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nip" class="col-sm-2 col-form-label text-right">NIP</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="nip" readonly value="{{ $users->nip }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jabatan" class="col-sm-2 col-form-label text-right">Jabatan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="jabatan" readonly value="{{ $users->jabatan }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jurusan" class="col-sm-2 col-form-label text-right">Jurusan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="jurusan" readonly value="{{ $users->jurusan }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="prodi" class="col-sm-2 col-form-label text-right">Prodi</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="prodi" readonly value="{{ $users->prodi }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tgl_lahir" class="col-sm-2 col-form-label text-right">Tanggal Lahir</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="tgl_lahir" readonly value="<?=Date('d F Y', strtotime($users->tgl_lahir)) ?>">
                    </div>
                </div>
                <div class="form-group text-center mt-4">
                    <a href="/users" class="btn btn-info ml-4">Kembali</a>
                </div>
            </div>
        </div>
    </div>
@endsection

