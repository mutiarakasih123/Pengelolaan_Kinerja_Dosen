<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SubUnsur23 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subUnsur23', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('idpelaksanaan');
            $table->integer('jmlMHS');
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
        Schema::dropIfExists('subUnsur23');
    }
}
