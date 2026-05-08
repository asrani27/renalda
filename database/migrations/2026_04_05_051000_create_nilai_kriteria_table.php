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
        Schema::create('nilai_kriteria', function (Blueprint $table) {
            $table->id();
            $table->foreignId('penerima_id')->constrained('penerima')->onDelete('cascade');
            $table->foreignId('kriteria_id')->constrained('kriteria')->onDelete('cascade');
            $table->integer('skor')->comment('Nilai skor 1-5');
            $table->timestamps();
            
            // Unique constraint to prevent duplicate entries
            $table->unique(['penerima_id', 'kriteria_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilai_kriteria');
    }
};