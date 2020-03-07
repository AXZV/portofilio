<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembeliansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembelians', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode')->unique();
            $table->string('kode_produk');
            $table->integer('jumlah');
            $table->double('harga_beli');
            $table->date('tanggal_beli');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('pembelians', function (Blueprint $table) {
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
        Schema::dropIfExists('pembelians');
    }
}
