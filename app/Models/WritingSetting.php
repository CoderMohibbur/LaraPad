<?php

// app/Models/WritingSetting.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WritingSetting extends Model
{
    protected $fillable = [
        'default_post_category',
        'default_post_format',
        'mail_server',
        'mail_port',
        'login_name',
        'password',
        'default_mail_category',
        'update_services',
    ];
}
