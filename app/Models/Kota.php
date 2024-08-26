<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kota extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'slug'];

    public function orangtuas(): HasMany
    {
        return $this->hasMany(Orangtua::class);
    }

    public function anaks(): HasManyThrough
    {
        return $this->hasManyThrough(Anak::class, Orangtua::class);
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
