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
        Schema::create('tb_assetdestinasi', function (Blueprint $table) {
            $table->id();
            $table->text('link');
            $table->foreignId('tb_destinasi_wisatas_id')->constrained('tb_destinasi_wisatas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tb_destinasi_wisatas', function (Blueprint $table) {
            $table->dropForeign(['tb_destinasi_wisatas_id']);
        });

        Schema::dropIfExists('tb_assetdestinasis');
    }
};
