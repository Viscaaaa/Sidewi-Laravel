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
        Schema::create('tb_akun', function (Blueprint $table) {
            $table->id();
            $table->string('email', 50);
            $table->string('password', 60);
            $table->string('nama', 25);
            $table->string('no_telp', 15);
            $table->text('foto')->nullable()->change();
            $table->string('role', 12);
            $table->string('token')->nullable()->change();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_akun');
    }
};
