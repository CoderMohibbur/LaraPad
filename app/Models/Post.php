<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'author_id',
        'short_description',
        'description',
        'image_url',
        'meta',
        'published_at',
    ];

    protected $casts = [
        'meta' => 'array',
        'published_at' => 'datetime',
    ];

    // 🔁 Relationships
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_post');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tag');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->latest();
    }

    public function revisions()
    {
        return $this->hasMany(PostRevision::class);
    }

    public function likes()
    {
        return $this->hasMany(PostLike::class);
    }

    public function views()
    {
        return $this->hasMany(PostView::class);
    }

    // 🔧 Accessors
    public function getMetaTitleAttribute()
    {
        return $this->meta['meta_title'] ?? $this->title;
    }

    public function getMetaDescriptionAttribute()
    {
        return $this->meta['meta_description'] ?? $this->short_description;
    }

    public function getMetaKeywordsAttribute()
    {
        return $this->meta['meta_keywords'] ?? null;
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }



    // App\Models\Post.php
    public function getCardCoverUrlAttribute(): ?string
    {
        // 1) external full URL ফিল্ড (http/https)
        foreach (['cover_image_url', 'cover_url', 'image_url', 'featured_image_url', 'banner_url', 'hero_image_url', 'og_image_url'] as $col) {
            $v = $this->{$col} ?? null;
            if ($v && Str::startsWith($v, ['http://', 'https://', '//'])) return $v;
        }

        // 2) meta JSON এ থাকলে
        $meta = $this->meta ?? null; // যদি JSON ক্যাস্ট করা থাকে
        if (is_array($meta)) {
            foreach (['image_url', 'image', 'og_image', 'cover'] as $k) {
                $m = data_get($meta, $k);
                if ($m && Str::startsWith($m, ['http://', 'https://', '//'])) return $m;
                if ($m) return $this->toStorageUrl($m);
            }
        }

        // 3) storage/path টাইপ ফিল্ড
        foreach (['cover_image', 'cover', 'featured_image', 'image', 'thumbnail', 'banner', 'hero_image', 'og_image'] as $col) {
            $v = $this->{$col} ?? null;
            if ($v) return $this->toStorageUrl($v);
        }

        return null; // না পেলে null (Blade এ placeholder ধরবে)
    }

    protected function toStorageUrl(string $path): string
    {
        $path = ltrim($path, '/');
        if (Str::startsWith($path, ['http://', 'https://', '//'])) return $path;

        // public disk → /storage/.. (symlink দরকার)
        if (Str::startsWith($path, 'public/')) {
            return Storage::url(substr($path, 7)); // public/foo.jpg → /storage/foo.jpg
        }

        // ইতিমধ্যে "storage/..." পাস থাকলে
        if (Str::startsWith($path, 'storage/')) {
            return asset($path);
        }

        // পাবলিক ফোল্ডারে সেভ করলে (uploads/images/..)
        if (Str::startsWith($path, ['uploads/', 'images/', 'img/', 'assets/'])) {
            return asset($path);
        }

        // ডিফল্ট: public disk ধরে নিলাম
        return Storage::url($path);
    }


    public function getAuthorAvatarUrlAttribute(): string
    {
        return optional($this->author)->avatar_url
            ?? 'https://i.pravatar.cc/80?img=21'; // স্থায়ী placeholder
    }


    // 🔁 Scope
    public function scopePublished($query)
    {
        return $query->whereNotNull('published_at')->where('published_at', '<=', now());
    }

    // 🔁 Auto slug generation
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($post) {
            if (empty($post->slug)) {
                $post->slug = Str::slug($post->title) . '-' . uniqid();
            }
        });
    }
}
