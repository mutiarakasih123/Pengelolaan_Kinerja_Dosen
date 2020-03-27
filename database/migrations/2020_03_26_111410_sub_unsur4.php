<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SubUnsur4 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subUnsur4', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('idpelaksanaan');
            $table->smallInteger('jnsBimb');
            $table->integer('jmlMHS');
            $table->integer('jmlSKS');
            $table->integer('idDosen1');
            $table->integer('idDosen2');
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
        Schema::dropIfExists('subUnsur4');
    }
}
