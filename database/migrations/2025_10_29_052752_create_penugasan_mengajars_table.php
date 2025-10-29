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
        Schema::create('penugasan_mengajar', function (Blueprint $table) {
            $table->id();

            $table->foreignId('mata_kuliah_id')
                  ->constrained('mata_kuliahs')
                  ->onDelete('cascade');

            $table->foreignId('dosen_id')
                  ->constrained('users')
                  ->onDelete('cascade');

            $table->integer('sks');

            $table->string('kelas', 50);

            $table->enum('semester', ['ganjil', 'genap']);

            $table->enum('time_block', ['full', 'pra-uts', 'pasca-uts'])->default('full');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penugasan_mengajar');
    }
};

