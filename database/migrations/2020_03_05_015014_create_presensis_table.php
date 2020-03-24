<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePresensisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presensis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode_pengajaran');
            $table->dateTime('waktu');
            $table->text('pembahasan');
            $table->integer('jumlah_bahasan');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('presensis', function (Blueprint $table) {
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
        Schema::dropIfExists('presensis');
    }
}
