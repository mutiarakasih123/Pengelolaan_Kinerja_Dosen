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
                        <label for="jakademi" class="col-sm-2 col-form-label text-right">Jabatan Akademi</label>
                        <div class="col-sm-10">
                            <select class="form-control @if ($errors->has('jakademi')) is-invalid @endif" id="jakademi" name="jakademi">
                                <option value="">Select Jabatan Akademi</option>
                                <option value="Asisten Ahli" {{ $users->jakademi == "Asisten Ahli" ? "selected" : "" }}>Asisten Ahli</option>
                                <option value="Lektor" {{ $users->jakademi == "Lektor" ? "selected" : "" }}>Lektor</option>
                                <option value="TU" {{ $users->jakademi == "TU" ? "selected" : "" }}>TU</option>
                            </select>
                            <div class="invalid-feedback">
                                {{ $errors->first('jakademi')}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="prodi" class="col-sm-2 col-form-label text-right">Prodi</label>
                        <div class="col-sm-10">
                            <select name="prodi" id="kaprodi" class="form-control @if ($errors->has('prodi')) is-invalid @endif">
                                <option value="">Select Prodi</option>
                                @foreach ($kaprodi as $data)
                                    @if (old('kaprodi') == $data->id || $users->prodi == $data->id)
                                        <option value="{{ $data->id }}" selected>{{ $data->nama_prodi }}</option>
                                    @else
                                        <option value="{{ $data->id }}">{{ $data->nama_prodi }}</option>
                                    @endif
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                {{ $errors->first('prodi')}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jurusan" class="col-sm-2 col-form-label text-right">Jurusan</label>
                        <div class="col-sm-10">
                            <select name="jurusan" id="jurusan" class="form-control @if ($errors->has('jurusan')) is-invalid @endif">
                                <option value="">Select Jurusan</option>
                                @foreach ($jurusan as $data)
                                    @if (old('jurusan') == $data->id || $users->jurusan == $data->id)
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

