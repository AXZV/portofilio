<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJumlahPresensisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jumlah_presensis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('id_pengajaran');
            $table->string('id_siswa');
            $table->string('masuk');
            $table->string('tidak_masuk');
            $table->string('ijin');
            $table->softDeletes();
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
        Schema::dropIfExists('jumlah_presensis');
    }
}
