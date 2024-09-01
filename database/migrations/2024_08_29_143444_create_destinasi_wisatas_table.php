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
        Schema::create('tb_destinasi_wisatas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tb_desa_wisatas_id')->constrained()->onDelete('cascade');
            $table->text('deskripsi');
            $table->string('nama', 50);
            $table->text('gambar');
            $table->string('slug', 60)->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tb_destinasi_wisatas', function (Blueprint $table) {
            $table->dropForeign(['tb_desa_wisatas_id']);
        });

        Schema::dropIfExists('tb_destinasi_wisatas');
    }
};
