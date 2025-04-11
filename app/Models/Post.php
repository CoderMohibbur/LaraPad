<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title', 'slug', 'excerpt', 'content', 'featured_image',
        'status', 'post_type', 'user_id', 'meta', 'meta_keywords',
        'canonical_url', 'og_title', 'og_description', 'og_image'
    ];

    protected $casts = [
        'meta' => 'array',
    ];
    public function scopePages($query)
{
    return $query->where('post_type', 'page');
}

public function scopePosts($query)
{
    return $query->where('post_type', 'post');
}
public function categories()
{
    return $this->belongsToMany(Category::class, 'category_post');
}

public function tags()
{
    return $this->belongsToMany(\App\Models\Tag::class, 'post_tag');
}

}


