<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SubUnsur6 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subUnsur6', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('idpelaksanaan');
            $table->integer('idDosen');
            $table->integer('jmlKeg');
            $table->integer('jmlSKS');
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
        Schema::dropIfExists('subUnsur6');
    }
}
