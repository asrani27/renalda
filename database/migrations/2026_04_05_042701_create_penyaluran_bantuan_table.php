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
        Schema::create('penyaluran_bantuan', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->foreignId('jadwal_penyaluran_id')->constrained('jadwal_penyaluran')->onDelete('cascade');
            $table->foreignId('penerima_id')->constrained('penerima')->onDelete('cascade');
            $table->enum('status', ['dalam proses', 'salur'])->default('dalam proses');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penyaluran_bantuan');
    }
};
