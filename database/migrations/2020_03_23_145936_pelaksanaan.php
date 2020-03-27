<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Pelaksanaan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelaksanaan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('idJurusan');
            $table->integer('subUnsur');
            $table->string('kegiatan');
            $table->integer('idProdi');
            $table->string('thnAjaran');
            $table->string('semester');
            $table->date('tglMulai');
            $table->date('tglSelesai');
            $table->text('filePendukung');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pelaksanaan');
    }
}
