<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuruKelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guru_kelas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode')->unique();
            $table->string('kode_kelas');
            $table->string('kode_guru');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('guru_kelas', function (Blueprint $table) {
            $table->foreign('kode_kelas')->references('kode')->on('kelas');
            $table->foreign('kode_guru')->references('no_identitas')->on('gurus');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('guru__kelas');
    }
}
