<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStokBarangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stok_barangs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('donasi_terima_id');
            $table->unsignedBigInteger('donasi_penyaluran_id');
            $table->integer('stok');
            $table->timestamps();

            // Menambahkan relasi ke tabel donasi_terimas
            $table->foreign('donasi_terima_id')->references('id')->on('donasi_terimas')->onDelete('cascade');

            // Menambahkan relasi ke tabel donasi_penyalurans
            $table->foreign('donasi_penyaluran_id')->references('id')->on('donasi_penyalurans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stok_barangs');
    }
}
