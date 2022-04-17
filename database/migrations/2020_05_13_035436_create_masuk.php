<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMasuk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('masuk', function (Blueprint $table) {
            $table->bigIncrements('id_masuk');
            $table->string('id_barang');
            $table->string('jumlah_asup');
            $table->date('tanggal_masuk');
            $table->string('harga_satuan');
            $table->string('harga_total');
            $table->string('nama_toko');
            $table->string('merek');
            $table->string('sumber_dana');
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
        Schema::dropIfExists('masuk');
    }
}
