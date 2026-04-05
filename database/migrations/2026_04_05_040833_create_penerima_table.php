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
        Schema::create('penerima', function (Blueprint $table) {
            $table->id();
            $table->foreignId('calon_penerima_id')->constrained('calon_penerima')->onDelete('cascade');
            $table->foreignId('bantuan_id')->constrained('bantuan')->onDelete('cascade');
            $table->string('status_penerima')->default('Proses');
            $table->date('tanggal_penyaluran')->nullable();
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penerima');
    }
};
