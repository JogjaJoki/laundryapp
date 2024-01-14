<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembayaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->string('kode', 32)->primary()->index();
            $table->string('kode_pesanan', 32);
            $table->double('tarif');
            $table->enum('metode', ['cash', 'transfer'])->default('cash');
            $table->timestamps();

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
        Schema::dropIfExists('pembayarans');
    }
}
