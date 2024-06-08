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
        Schema::create('pelanggarans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('siswa_id');
            $table->unsignedBigInteger('kategori_id');
            $table->unsignedBigInteger('sanksi_id');
            $table->unsignedBigInteger('guru_id');
            $table->date('date');
            $table->text('description')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('siswa_id')->references('id')->on('siswas');
            $table->foreign('kategori_id')->references('id')->on('kategoris');
            $table->foreign('sanksi_id')->references('id')->on('sanksis');
            $table->foreign('guru_id')->references('id')->on('pengguna'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelanggarans');
    }
};
