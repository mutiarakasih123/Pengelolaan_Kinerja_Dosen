<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SubUnsur5 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subUnsur5', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('idpelaksanaan');
            $table->integer('jmlMHS');
            $table->integer('idDosenK');
            $table->integer('idDosenA');
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
        Schema::dropIfExists('subUnsur5');
    }
}
