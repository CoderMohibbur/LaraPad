<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostLike extends Model
{
    protected $fillable = [
        'post_id',
        'user_id',
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

    // 🔁 Check if liked by specific user (optional helper)
    public static function isLikedByUser($postId, $userId)
    {
        return self::where('post_id', $postId)
                   ->where('user_id', $userId)
                   ->exists();
    }
}
