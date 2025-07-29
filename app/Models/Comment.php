<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'post_id',
        'user_id',
        'comment',
        'approved',
    ];

    protected $casts = [
        'approved' => 'boolean',
    ];

    // 🔁 Relationships
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // 🔎 Scope for approved comments
    public function scopeApproved($query)
    {
        return $query->where('approved', true);
    }
    public function comments()
    {
        return $this->hasMany(\App\Models\Comment::class)->approved(); // Only approved
    }
}
