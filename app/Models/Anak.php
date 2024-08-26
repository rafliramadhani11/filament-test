<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Anak extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'orangtua_id',
        'name',
        'gender',
        'age',
    ];

    public function orangtua(): BelongsTo
    {
        return $this->belongsTo(OrangTua::class);
    }

    public function timbangans(): HasMany
    {
        return $this->hasMany(Timbangan::class);
    }

    public function getRouteKeyName(): string
    {
        return 'name';
    }
}
