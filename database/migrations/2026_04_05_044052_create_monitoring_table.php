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
        Schema::create('monitoring', function (Blueprint $table) {
            $table->id();
            $table->foreignId('penerima_id')->constrained('penerima')->onDelete('cascade');
            $table->foreignId('pendamping_id')->constrained('pendamping')->onDelete('cascade');
            $table->date('tanggal_monitoring');
            $table->text('kondisi_usaha');
            $table->enum('perkembangan_usaha', ['baik', 'cukup', 'kurang'])->default('cukup');
            $table->string('foto_monitoring')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('monitoring');
    }
};