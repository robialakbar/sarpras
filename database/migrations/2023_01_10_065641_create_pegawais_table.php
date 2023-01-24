<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePegawaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawais', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nip')->nullable();
            $table->string('nama')->nullable();
            $table->string('hp')->nullable();
            $table->string('jabatan')->nullable();
            $table->string('foto')->nullable();
            $table->string('nama_seksi')->nullable();
            $table->string('nama_bidang')->nullable();
            $table->string('nama_dinas')->nullable();
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
        Schema::dropIfExists('pegawais');
    }
}
