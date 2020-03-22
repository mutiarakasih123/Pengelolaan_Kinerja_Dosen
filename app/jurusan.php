<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jurusan extends Model
{
    //nama_jurusan
    protected $table = "tbljurusan";
    protected $fillable = ['nama_jurusan','idKaprodi'];
}
