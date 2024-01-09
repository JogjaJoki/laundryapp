<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLayananPesanan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('layanan_pesanan', function (Blueprint $table) {
            $table->id();
            $table->string('kode_layanan', 32);
            $table->string('kode_pesanan', 32);
            $table->double('jumlah');
            $table->double('total');
            $table->timestamps();

            $table->foreign('kode_layanan')->references('kode')->on('layanans')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('kode_pesanan')->references('kode')->on('pesanans')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('layanan_pesanan');
    }
}
