<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Aturan extends Model
{
    protected $table = 'aturan';

    protected $fillable = [
        'penyakit_id',
        'gejala_id',
        'bobot_cf',
    ];

    protected function casts(): array
    {
        return [
            'bobot_cf' => 'float',
        ];
    }

    public function penyakit(): BelongsTo
    {
        return $this->belongsTo(Penyakit::class, 'penyakit_id');
    }

    public function gejala(): BelongsTo
    {
        return $this->belongsTo(Gejala::class, 'gejala_id');
    }
}
