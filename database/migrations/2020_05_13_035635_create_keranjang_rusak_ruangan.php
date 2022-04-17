<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKeranjangRusakRuangan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keranjang_rusak_ruangan', function (Blueprint $table) {
            $table->bigIncrements('id_rusak_ruangan');
            $table->string('id_barang_rusak');
            $table->string('jumlah_rusak_ruangan');
            $table->string('id_ruangan_rusak');
            $table->date('tanggal_rusak');
            $table->string('status');
            $table->string('user_id_ruangan');
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
        Schema::dropIfExists('keranjang_rusak_ruangan');
    }
}
