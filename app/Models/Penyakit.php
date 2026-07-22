<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Penyakit extends Model
{
    protected $table = 'penyakit';

    protected $fillable = [
        'kode',
        'nama',
        'deskripsi',
        'penanganan',
    ];

    protected function casts(): array
    {
        return [
            'penanganan' => 'array',
        ];
    }

    public function aturan(): HasMany
    {
        return $this->hasMany(Aturan::class, 'penyakit_id');
    }
}
