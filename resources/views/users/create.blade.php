@extends('template')
@section('konten')
    <div class="mt-4" style="padding-left: 200px; padding-right: 200px">
        <div class="card" >
            <div class="card-header"><h4>Tambah Data Users</h4></div>
            <div class="card-body" style="padding-left: 50px; padding-right: 50px">
                <form action="/users/store" method="post">
                    {{ csrf_field() }}
                    <div class="form-group row">
                        <label for="nama" class="col-sm-2 col-form-label col-form-label  text-right">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @if ($errors->has('nama')) is-invalid @endif" id="nama" placeholder="Nama" name="nama">
                            <div class="invalid-feedback">
                                {{ $errors->first('nama')}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label text-right">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control @if ($errors->has('email')) is-invalid @endif" id="email" placeholder="Email" name="email">
                            <div class="invalid-feedback">
                                {{ $errors->first('email')}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nip" class="col-sm-2 col-form-label text-right">NIP</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control @if ($errors->has('nip')) is-invalid @endif" id="nip" placeholder="NIP" name="nip">
                            <div class="invalid-feedback">
                                {{ $errors->first('nip')}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jabatan" class="col-sm-2 col-form-label text-right">Jabatan</label>
                        <div class="col-sm-10">
                            <select class="form-control @if ($errors->has('jabatan')) is-invalid @endif" id="jabatan" name="jabatan">
                                <option value="">Select Jabatan</option>
                                <option value="Admin">Admin</option>
                                <option value="TU">TU</option>
                                <option value="Dosen">Dosen</option>
                            </select>
                            <div class="invalid-feedback">
                                {{ $errors->first('jabatan')}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jurusan" class="col-sm-2 col-form-label text-right">Jurusan</label>
                        <div class="col-sm-10">
                            <select class="form-control @if ($errors->has('jurusan')) is-invalid @endif" id="jurusan" name="jurusan">
                                <option value="">Select Jurusan</option>
                                <option value="Sistem Informasi">Sistem Informasi</option>
                                <option value="Sistem Informatika">Sistem Informatika</option>
                                <option value="Hukum">Hukum</option>
                            </select>
                            <div class="invalid-feedback">
                                {{ $errors->first('jurusan')}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="prodi" class="col-sm-2 col-form-label text-right">Prodi</label>
                        <div class="col-sm-10">
                            <select class="form-control @if ($errors->has('prodi')) is-invalid @endif" id="prodi" name="prodi">
                                <option value="">Select Prodi</option>
                                <option value="Teknik">Teknik</option>
                                <option value="Hukum">Hukum</option>
                                <option value="Ekonomi">Ekonomi</option>
                            </select>
                            <div class="invalid-feedback">
                                {{ $errors->first('prodi')}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tgl_lahir" class="col-sm-2 col-form-label text-right">Tanggal Lahir</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control @if ($errors->has('tgl_lahir')) is-invalid @endif" id="tgl_lahir" name="tgl_lahir">
                            <div class="invalid-feedback">
                                {{ $errors->first('tgl_lahir')}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-success">Sumbit</button>
                        <a href="/users" class="btn btn-info ml-4">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
