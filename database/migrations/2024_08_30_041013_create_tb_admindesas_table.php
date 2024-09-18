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
        Schema::create('tb_admindesa', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tb_desa_wisatas_id')->constrained('tb_desa_wisatas')->onDelete('cascade');
            $table->foreignId('tb_akun_id')->constrained('tb_akun')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('admin_desa', function (Blueprint $table) {
            $table->dropForeign(['tb_desa_wisatas_id']);
            $table->dropForeign(['tb_akun_id']);
        });


        Schema::dropIfExists('tb_admindesa');
    }
};
