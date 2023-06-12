<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('pesantrens', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('alamat');
            $table->integer('jumlah_santri_putera');
            $table->integer('jumlah_santri_puteri');
            $table->integer('jumlah_muallim');
            $table->integer('jatah_beras');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pesantrens');
    }
};

