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
        Schema::create('serah_terima', function (Blueprint $table) {
            $table->id();
            $table->foreignId('penerima_id')->constrained('penerima')->onDelete('cascade');
            $table->foreignId('pendamping_id')->constrained('pendamping')->onDelete('cascade');
            $table->string('nomor_bast');
            $table->date('tanggal_bast');
            $table->string('foto_bast')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('serah_terima');
    }
};
