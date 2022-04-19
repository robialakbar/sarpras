<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBarangNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang_news', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode')->index();
            $table->string('kode_lokasi')->index();
            $table->string('tahun_anggaran');
            $table->string('kode_barang');
            $table->string('nomor_aset');
            $table->string('subkelompok_barang');
            $table->string('merk_type');
            $table->date('tanggal_perolehan');
            $table->string('rupiah_satuan')->default(0);
            $table->string('ruang')->default(0);
            $table->string('kondisi_barang')->default(0);
            $table->string('gambar')->default(0);
            $table->string('gambar')->default(0);
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barang_news');
    }
}
