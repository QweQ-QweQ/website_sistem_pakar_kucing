<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Gejala extends Model
{
    protected $table = 'gejala';

    protected $fillable = [
        'kode',
        'nama',
    ];

    public function aturan(): HasMany
    {
        return $this->hasMany(Aturan::class, 'gejala_id');
    }
}
