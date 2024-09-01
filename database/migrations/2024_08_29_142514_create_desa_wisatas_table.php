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
        Schema::create('tb_desa_wisatas', function (Blueprint $table) {
            $table->id();
            $table->string('gambar');
            $table->string('alamat');
            $table->string('nama', 25);
            $table->text('deskripsi');
            $table->string('maps');
            $table->enum('kategori', ['rintisan', 'berkembang', 'maju', 'mandiri']);
            $table->enum('kabupaten', ['Badung', 'Bangli', 'Buleleng', 'Denpasar', 'Gianyar', 'Jembrana', 'Karangasem', 'Klungkung', 'Tabanan']);
            $table->string('slug', 35);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_desa_wisatas');
    }
};
