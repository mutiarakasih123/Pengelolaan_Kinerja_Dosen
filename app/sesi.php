<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sesi extends Model
{
    protected $table = "sesi";
    protected $fillable = ['idUnsur','unsur','sesiKe','idDosenG','idDosenT','idDosenP'];
}
