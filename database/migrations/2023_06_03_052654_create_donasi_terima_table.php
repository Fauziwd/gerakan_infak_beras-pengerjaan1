<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonasiTerimaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donasi_terimas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ota_id');
            $table->unsignedBigInteger('anggota_id');
            $table->integer('jumlah_donasi');
            $table->date('tanggal_donasi');
            $table->timestamps();

            // Menambahkan relasi ke tabel anggotas
            $table->foreign('ota_id')->references('id')->on('otas')->onDelete('cascade');
            $table->foreign('anggota_id')->references('id')->on('anggotas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('donasi_terimas');
    }
}
