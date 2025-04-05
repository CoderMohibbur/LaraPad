<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'slug', 'excerpt', 'content', 'featured_image', 'status', 'user_id', 'meta'];

    protected $casts = ['meta' => 'array'];

    public function categories() {
        return $this->belongsToMany(Category::class);
    }

    public function tags() {
        return $this->belongsToMany(Tag::class);
    }

    public function author() {
        return $this->belongsTo(User::class, 'user_id');
    }
    
}

