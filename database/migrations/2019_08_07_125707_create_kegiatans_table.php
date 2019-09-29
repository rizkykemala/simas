<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKegiatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kegiatans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('jenis_kegiatan');
            $table->string('nama_kegiatan');
            $table->string('narasumber');
            $table->date('tgl_kegiatan');
            $table->time('jam');
            $table->bigInteger('HTM');
            $table->string('keterangan');
            $table->string('ket_photo');
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
        Schema::dropIfExists('kegiatans');
    }
}
