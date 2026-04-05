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
        Schema::create('calon_penerima', function (Blueprint $table) {
            $table->id();
            $table->string('nik', 16)->unique();
            $table->string('nama');
            $table->text('alamat');
            $table->string('usaha');
            $table->string('telp');
            $table->foreignId('pendamping_id')->nullable()->constrained('pendamping')->onDelete('set null');
            $table->string('dokumen_ktp')->nullable();
            $table->string('dokumen_kk')->nullable();
            $table->string('dokumen_foto_usaha')->nullable();
            $table->string('dokumen_sktm')->nullable();
            $table->string('dokumen_proposal')->nullable();
            $table->enum('status_verif', ['valid', 'tidak valid'])->default('tidak valid');
            $table->date('tanggal_verif')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calon_penerima');
    }
};