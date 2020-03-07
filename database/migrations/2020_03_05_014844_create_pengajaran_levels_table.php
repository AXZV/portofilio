<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengajaranLevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengajaran_levels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode')->unique();
            $table->string('nama');
            $table->integer('tingkat');
            $table->text('catatan');
            $table->string('kode_pengajaran');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('pengajaran_levels', function (Blueprint $table) {
            $table->foreign('kode_pengajaran')->references('kode')->on('pengajarans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengajaran__levels');
    }
}
