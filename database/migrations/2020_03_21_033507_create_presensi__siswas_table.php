<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePresensiSiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presensi_siswa', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('id_presensi');
            $table->string('id_siswa');
            $table->enum('status', ['Masuk', 'Tidak Masuk', 'Ijin']);
            $table->string('catatan')->nullable();
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
        Schema::dropIfExists('presensi_siswa');
    }
}
