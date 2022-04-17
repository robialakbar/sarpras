<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRusakLuar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rusak_luar', function (Blueprint $table) {
            $table->bigIncrements('id_rusak_luar');
            $table->string('id_barang_rusak_luar');
            $table->string('jumlah_rusak_luar');
            $table->date('tanggal_rusak_luar');
            $table->string('status');
            $table->string('user_id_luar');
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
        Schema::dropIfExists('rusak_luar');
    }
}
