<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Timbangan extends Model
{
    use HasFactory;

    protected $fillable = [
        'anak_id',
        'weight',
        'height',
        'body_mass_index'
    ];

    public function anaks(): BelongsTo
    {
        return $this->belongsTo(Anak::class);
    }
}
