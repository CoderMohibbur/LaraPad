<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReadingSetting extends Model
{
    protected $fillable = [
        'homepage_display',
        'homepage_id',
        'posts_page_id',
        'blog_page_limit',
        'feed_limit',
        'post_feed_type',
        'search_engine_visibility',
    ];
}
