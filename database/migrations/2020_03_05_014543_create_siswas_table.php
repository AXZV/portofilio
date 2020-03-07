<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('siswas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no_daftar')->unique();
            $table->string('nama_depan');
            $table->string('nama_belakang');
            $table->date('tanggal_lahir');
            $table->string('tempat_lahir');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('agama');
            $table->text('alamat');
            $table->string('no_telp');
            $table->string('email');
            $table->date('tanggal_masuk');
            $table->date('tanggal_keluar');
            $table->boolean('status_aktif');
            $table->boolean('status_bayar');
            $table->double('jumlah_bayar');
            $table->dateTime('tanggal_bayar');
            $table->string('kode_instansi');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('siswas', function (Blueprint $table) {
            $table->foreign('kode_instansi')->references('kode')->on('instansis');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('siswas');
    }
}
