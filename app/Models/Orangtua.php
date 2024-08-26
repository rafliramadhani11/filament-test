<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Orangtua extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'kota_id',
        'name',
        'job',
        'type',
        'gender',
        'date_of_birth',
        'phone_number',
        'district',
        'sub_district',
        'address'
    ];

    public function anaks(): HasMany
    {
        return $this->hasMany(Anak::class);
    }

    public function kota(): BelongsTo
    {
        return $this->belongsTo(Kota::class);
    }

    public function getRouteKeyName(): string
    {
        return 'name';
    }
}
