<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesanans', function (Blueprint $table) {
            $table->string('kode', 32)->primary()->index();
            $table->unsignedBigInteger('kasir_id');
            $table->unsignedBigInteger('pelanggan_id');
            $table->double('total');
            $table->double('longitude')->nullable();
            $table->double('latitude')->nullable();
            $table->enum('status', ['penjemputan', 'proses', 'pengiriman', 'selesai', 'batal']);
            $table->boolean('isTemp')->default(false);
            $table->timestamps();

            $table->foreign('kasir_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('pelanggan_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pesanans');
    }
}
