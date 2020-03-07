<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengajaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengajarans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode')->unique();
            $table->string('kode_guru_kelas');
            $table->string('kode_siswa');
            $table->boolean('status_selesai');
            $table->dateTime('tanggal_selesai');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('pengajarans', function (Blueprint $table) {
            $table->foreign('kode_guru_kelas')->references('kode')->on('guru_kelas');
            $table->foreign('kode_siswa')->references('no_daftar')->on('siswas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengajarans');
    }
}
