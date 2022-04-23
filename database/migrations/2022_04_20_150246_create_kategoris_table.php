<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKategorisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::create('kategoris', function (Blueprint $table) {
    		$table->bigIncrements('id');
    		$table->string('kode_kategori')->nullable();
    		$table->string('nama_kategori')->nullable();
    		$table->bigInteger('created_by')->nullable();
    		$table->bigInteger('updated_by')->nullable();
    		$table->bigInteger('deleted_by')->nullable();
    		$table->timestamps();
    		$table->softDeletes();
    	});

    	 Schema::dropIfExists('kategori');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    	Schema::dropIfExists('kategoris');
    }
}
