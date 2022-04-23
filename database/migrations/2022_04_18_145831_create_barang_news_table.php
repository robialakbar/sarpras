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
            $table->string('kode')->index()->nullable();
            $table->string('kode_lokasi')->index()->nullable();
            $table->string('tahun_anggaran')->nullable();
            $table->string('kode_barang')->nullable();
            $table->string('nomor_aset')->nullable();
            $table->string('subkelompok_barang')->nullable();
            $table->string('merk_type')->nullable();
            $table->date('tanggal_perolehan')->nullable();
            $table->string('rupiah_satuan')->default(0);
            $table->string('ruang')->nullable();
            $table->string('kondisi_barang')->nullable();
            $table->string('gambar')->nullable();
            $table->bigInteger('created_by')->nullable();
            $table->bigInteger('updated_by')->nullable();
            $table->bigInteger('deleted_by')->nullable();
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
