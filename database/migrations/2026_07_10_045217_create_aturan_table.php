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
        Schema::create('aturan', function (Blueprint $table) {
        $table->id();

        $table->foreignId('penyakit_id')
            ->constrained('penyakit')
            ->cascadeOnDelete();

        $table->foreignId('gejala_id')
            ->constrained('gejala')
            ->cascadeOnDelete();

        $table->decimal('bobot_cf', 4, 2);
        $table->timestamps();

        $table->unique(['penyakit_id', 'gejala_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aturan');
    }
};
