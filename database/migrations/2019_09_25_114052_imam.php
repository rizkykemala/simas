<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Imam extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imam', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_imam')->nullable();
            $table->integer('usia_imam')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->string('alamat_imam')->nullable();
            $table->string('no_hp')->nullable();
            $table->string('keterangan')->nullable();
            $table->date('tgl_lahir');
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
        Schema::dropIfExists('imam');
    }
}
