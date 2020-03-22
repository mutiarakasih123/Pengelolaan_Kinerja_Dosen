<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    protected $table = "tbluser";
    protected $fillable = ['nama','email','nip','jabatan','jurusan','prodi','tgl_lahir','password','akses'];
}








