<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGurusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    
    public function up()
    {
        Schema::create('gurus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no_identitas')->unique();
            $table->string('nama_depan');
            $table->string('nama_belakang')->nullable();
            $table->date('tanggal_lahir');
            $table->string('tempat_lahir');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('agama');
            $table->text('alamat');
            $table->string('alamat_domisili');
            $table->string('no_telp');
            $table->string('email');
            $table->date('tanggal_masuk');
            $table->date('tanggal_keluar')->nullable();
            $table->enum('status_aktif', ['Aktif', 'Tidak Aktif']);
            $table->string('kode_instansi');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('gurus', function (Blueprint $table) {
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
        Schema::dropIfExists('gurus');
    }
}
