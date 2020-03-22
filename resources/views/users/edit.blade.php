@extends('template')

@section('konten')
    <div class="mt-4" style="padding-left: 200px; padding-right: 200px">
        <div class="card" >
            <div class="card-header"><h4>Edit Data Users</h4></div>
            <div class="card-body" style="padding-left: 50px; padding-right: 50px">
                <form action="/users/update/{{ $users->id }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="form-group row">
                        <label for="nama" class="col-sm-2 col-form-label col-form-label  text-right">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @if ($errors->has('nama')) is-invalid @endif" id="nama" placeholder="Nama" name="nama" 
                            value="{{ $users->nama }}">
                            <div class="invalid-feedback">
                                {{ $errors->first('nama')}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label text-right">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control @if ($errors->has('email')) is-invalid @endif" id="email" placeholder="Email" name="email" value="{{ $users->email }}">
                            <div class="invalid-feedback">
                                {{ $errors->first('email')}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nip" class="col-sm-2 col-form-label text-right">NIP</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control @if ($errors->has('nip')) is-invalid @endif" id="nip" placeholder="NIP" name="nip" value="{{ $users->nip }}">
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
                                <option value="Admin" {{ $users->jabatan == "Admin" ? "selected" : "" }}>Admin</option>
                                <option value="TU" {{ $users->jabatan == "TU" ? "selected" : "" }}>TU</option>
                                <option value="Dosen" {{ $users->jabatan == "Dosen" ? "selected" : "" }}>Dosen</option>
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
                                <option value="Sistem Informasi" {{ $users->jurusan == "Sistem Informasi" ? "selected" : "" }}>Sistem Informasi</option>
                                <option value="Sistem Informatika" {{ $users->jurusan == "Sistem Informatika" ? "selected" : "" }}>Sistem Informatika</option>
                                <option value="Hukum" {{ $users->jurusan == "Hukum" ? "selected" : "" }}>Hukum</option>
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
                                <option value="Teknik" {{ $users->prodi == "Teknik" ? "selected" : "" }}>Teknik</option>
                                <option value="Hukum" {{ $users->prodi == "Hukum" ? "selected" : "" }}>Hukum</option>
                                <option value="Ekonomi" {{ $users->prodi == "Ekonomi" ? "selected" : "" }}>Ekonomi</option>
                            </select>
                            <div class="invalid-feedback">
                                {{ $errors->first('prodi')}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tgl_lahir" class="col-sm-2 col-form-label text-right">Tanggal Lahir</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control @if ($errors->has('tgl_lahir')) is-invalid @endif" id="tgl_lahir" name="tgl_lahir" value="{{ $users->tgl_lahir }}">
                            <div class="invalid-feedback">
                                {{ $errors->first('tgl_lahir')}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-sm-2 col-form-label text-right">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="password" name="password" >
                            <input type="hidden" class="form-control" name="Oldpassword" value="{{ $users->password }}">
                        </div>
                    </div>
                    <div class="form-group text-center mt-4">
                        <button type="submit" class="btn btn-success">Save</button>
                        <a href="/users" class="btn btn-info ml-4">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

