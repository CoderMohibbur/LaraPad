<?php

// app/Models/TeamMember.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TeamMember extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'role',
        'image_url',
        'image_path',
        'tags',
        'order',
        'is_active',
        'linkedin_url',
        'twitter_url'
    ];

    protected $casts = ['tags' => 'array', 'is_active' => 'boolean'];

    public function scopeActive($q)
    {
        return $q->where('is_active', true);
    }
    public function scopeOrdered($q)
    {
        return $q->orderBy('order')->orderBy('id');
    }

    public function getImageSrcAttribute()
    {
        return $this->image_path ? asset('storage/' . $this->image_path) : ($this->image_url ?? '');
    }
}
