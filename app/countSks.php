<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class countSks extends Model
{
    //
    protected $table = "countsks";
    protected $fillable = ['pelaksanaan','sesi','dosen','countBkd','countSkp'];
}
