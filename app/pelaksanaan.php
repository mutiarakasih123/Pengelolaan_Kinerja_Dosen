<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pelaksanaan extends Model
{
    protected $table = "pelaksanaan";
    protected $fillable = ['idJurusan','subUnsur','kegiatan','idProdi','thnAjaran','semester','tglMulai','tglSelesai','filePendukung'];
}