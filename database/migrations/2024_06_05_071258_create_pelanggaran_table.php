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
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('sanction_id');
            $table->unsignedBigInteger('teacher_id');
            $table->date('date');
            $table->text('description')->nullable();
            $table->timestamps();

            $table->foreign('student_id')->references('id')->on('siswas');
            $table->foreign('category_id')->references('id')->on('kategoris');
            $table->foreign('sanction_id')->references('id')->on('sanksis');
            $table->foreign('teacher_id')->references('id')->on('penggunas'); 
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
