<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SubUnsur1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subUnsur1', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('idPelaksanaan');
            $table->string('kodeMK');
            $table->string('namaMK');
            $table->integer('jumSKS');
            $table->string('kelas');
            $table->integer('jumSKST');
            $table->integer('jumSKSP');
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
        Schema::dropIfExists('subUnsur1');
    }
}
