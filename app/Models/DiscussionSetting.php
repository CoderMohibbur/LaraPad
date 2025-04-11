<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DiscussionSetting extends Model
{
    protected $fillable = [
        // Default post settings
        'notify_linked_blogs',
        'allow_pingbacks',
        'allow_comments',

        // Other comment settings
        'require_name_email',
        'require_registered_user',
        'comment_close_days',
        'threaded_comments_level',
        'break_comments_pages',
        'comments_per_page',
        'default_comment_page',

        // Email me
        'email_on_comment',
        'email_on_moderation',

        // Before a comment appears
        'manual_approve',
        'previously_approved',

        // Moderation
        'moderation_keys',
        'disallowed_keys',

        // Avatar settings
        'show_avatars',
        'avatar_rating',
        'default_avatar',
    ];

    protected $casts = [
        'notify_linked_blogs' => 'boolean',
        'allow_pingbacks' => 'boolean',
        'allow_comments' => 'boolean',
        'require_name_email' => 'boolean',
        'require_registered_user' => 'boolean',
        'break_comments_pages' => 'boolean',
        'email_on_comment' => 'boolean',
        'email_on_moderation' => 'boolean',
        'manual_approve' => 'boolean',
        'previously_approved' => 'boolean',
        'show_avatars' => 'boolean',
    ];
}
