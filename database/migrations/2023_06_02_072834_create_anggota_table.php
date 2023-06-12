<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('anggotas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_anggota');
            $table->string('alamat');
            $table->string('email')->unique();
            $table->string('telepon')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->enum('jenis_kelamin', ['L', 'P'])->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->enum('status', ['menikah', 'belum', 'janda', 'duda'])->nullable();
            $table->string('pekerjaan')->nullable();
            $table->string('komunitas_diikuti')->nullable();
            $table->string('tentang_paskas')->nullable();
            $table->string('kesanggupan')->nullable();
            $table->string('harapan')->nullable();
            $table->enum('seksi_paskas', ['cs', 'mkp', 'keuangan', 'fundraising', 'sdm', 'support', 'distributor'])->nullable();
            // Tambahkan kolom lain yang diperlukan di sini
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anggotas');
    }
};
