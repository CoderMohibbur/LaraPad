<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostRevision extends Model
{
    protected $fillable = [
        'post_id',
        'edited_by',
        'title',
        'short_description',
        'description',
        'meta',
    ];

    protected $casts = [
        'meta' => 'array',
    ];

    // 🔁 Relationships
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function editor()
    {
        return $this->belongsTo(User::class, 'edited_by');
    }

    // ✅ Optional: getMeta accessors for fallback
    public function getMetaTitleAttribute()
    {
        return $this->meta['meta_title'] ?? $this->title;
    }

    public function getMetaDescriptionAttribute()
    {
        return $this->meta['meta_description'] ?? $this->short_description;
    }

    public function getMetaKeywordsAttribute()
    {
        return $this->meta['meta_keywords'] ?? null;
    }
}
