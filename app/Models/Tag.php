<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Tag extends Model
{
    protected $fillable = [
        'name',
        'slug',
    ];

    // 🔁 Relationship: A tag belongs to many posts
    public function posts()
    {
        return $this->belongsToMany(Post::class, 'post_tag');
    }

    // 🔁 Auto slug generator (if not provided)
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($tag) {
            if (empty($tag->slug)) {
                $tag->slug = Str::slug($tag->name);
            }
        });
    }
}
