<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventarisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventaris', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('jenis_barang', ['AI', 'AK', 'SS', 'AE', 'BK', 'LL']);
            $table->string('nama_barang')->nullable();
            $table->integer('jumlah_barang')->nullable();
            $table->string('keterangan')->nullable();
            $table->date('tgl_barang');
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
        Schema::dropIfExists('inventaris');
    }
}
