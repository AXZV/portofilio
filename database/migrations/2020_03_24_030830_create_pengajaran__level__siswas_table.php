<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengajaranLevelSiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengajaran_level_siswa', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode_pengajaran_level');
            $table->string('id_siswa');
            $table->integer('tingkat');
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
        Schema::dropIfExists('pengajaran_level_siswa');
    }
}
