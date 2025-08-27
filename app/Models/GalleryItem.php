<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class GalleryItem extends Model
{
    protected $fillable = [
        'image_path','alt','caption','tag','year','position','is_active','meta'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'year'      => 'integer',
        'meta'      => 'array',
    ];

    protected $appends = ['src'];

    ## Scopes
    public function scopeActive(Builder $q): Builder
    {
        return $q->where('is_active', true);
    }

    public function scopeOrdered(Builder $q): Builder
    {
        return $q->orderBy('position')->orderByDesc('id');
    }

    public function getSrcAttribute(): string
    {
        $p = (string) ($this->image_path ?? '');
        if ($p === '') return asset('images/placeholder.webp'); // fallback

        // Absolute url or already /storage... => return as-is via asset()
        if (Str::startsWith($p, ['http://','https://'])) return $p;
        if (Str::startsWith($p, ['/storage','storage']))  return asset(ltrim($p, '/'));

        // If saved like "uploads/gallery/xxx.jpg" (public disk), prefix /storage
        return asset('storage/' . ltrim($p, '/'));
    }
}
