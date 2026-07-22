<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RiwayatDiagnosa extends Model
{
    protected $table = 'riwayat_diagnosas';

    protected $fillable = [
        'user_id',
        'hasil_penyakit',
        'nilai_keyakinan',
        'gejala_dipilih',
        'diagnosis_alternatif',
    ];

    protected function casts(): array
    {
        return [
            'nilai_keyakinan' => 'float',
            'gejala_dipilih' => 'array',
            'diagnosis_alternatif' => 'array',
        ];
    }
}
