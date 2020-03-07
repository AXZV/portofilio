<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDistribusiProduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    
    public function up()
    {
        Schema::create('distribusi_produks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode')->unique();
            $table->string('kode_produk');
            $table->integer('jumlah');
            $table->string('kode_instansi');
            $table->date('tanggal');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('distribusi_produks', function (Blueprint $table) {
            $table->foreign('kode_produk')->references('kode')->on('produks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('distribusi__produks');
    }
}
