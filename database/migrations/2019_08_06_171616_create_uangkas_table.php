<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUangkasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uangkas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('jumlah_uang')->nullable();
            $table->enum('jenis_transaksi', ['K', 'D']);
            $table->date('tgl_transaksi')->nullable();
            $table->string('keterangan')->nullable();
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
        Schema::dropIfExists('uangkas');
    }
}
