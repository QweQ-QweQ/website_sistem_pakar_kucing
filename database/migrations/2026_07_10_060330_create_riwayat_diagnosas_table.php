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
    Schema::create('riwayat_diagnosas', function (Blueprint $table) {
        $table->id();

        $table->foreignId('user_id')
            ->nullable()
            ->constrained('users')
            ->nullOnDelete();

        $table->string('hasil_penyakit');
        $table->decimal('nilai_keyakinan', 5, 2);
        $table->json('gejala_dipilih');
        $table->json('diagnosis_alternatif')->nullable();

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_diagnosas');
    }
};
