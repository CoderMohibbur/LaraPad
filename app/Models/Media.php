<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Media extends Model
{
    use HasFactory;

    protected $fillable = [
        'filename',
        'original_name',
        'mime_type',
        'size',
        'folder',
        'alt_text',
        'title',
        'description',
        'position', // ✅ এটাও যোগ করো
        'uploaded_by',
        'meta_data',
        'context_type',
        
    ];

    protected $casts = [
        'meta_data' => 'array',
        'tags' => 'array',
    ];

    public function uploader()
    {
        return $this->belongsTo(User::class, 'uploaded_by');
    }

    // Accessor for image URL
    public function getUrlAttribute()
    {
        return asset("uploads/{$this->folder}/{$this->filename}");
    }
}
