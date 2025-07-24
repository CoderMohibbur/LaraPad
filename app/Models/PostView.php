<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostView extends Model
{
    public $timestamps = false; // Because we only use `viewed_at`

    protected $fillable = [
        'post_id',
        'ip_address',
        'user_agent',
        'viewed_at',
    ];

    protected $casts = [
        'viewed_at' => 'datetime',
    ];

    // 🔁 Relationship
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
