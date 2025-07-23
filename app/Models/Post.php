<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'category_id',
        'author_id',
        'short_description',
        'description',
        'image_url',
        'meta',
        'published_at',
    ];

    protected $casts = [
        'meta' => 'array',
        'published_at' => 'datetime',
    ];

    // Relationships
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }


    // Accessors for SEO Meta (optional)
    public function getMetaTitleAttribute()
    {
        return $this->meta['meta_title'] ?? $this->title;
    }

    public function getMetaDescriptionAttribute()
    {
        return $this->meta['meta_description'] ?? str($this->short_description)->limit(150);
    }

    public function getMetaKeywordsAttribute()
    {
        return $this->meta['meta_keywords'] ?? '';
    }


    public function tags()
{
    return $this->belongsToMany(Tag::class);
}

public function categories()
{
    return $this->belongsToMany(Category::class);
}





}
