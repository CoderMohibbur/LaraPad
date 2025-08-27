<?php

// app/Models/Review.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Review extends Model
{
    use SoftDeletes;

    protected $fillable = ['rating','quote','reviewer','verified_label','order','is_active'];

    public function scopeActive($q){ return $q->where('is_active', true); }
    public function scopeOrdered($q){ return $q->orderBy('order')->orderByDesc('id'); }

    // optional: পূর্ণ তারকা সংখ্যা
    public function getStarsAttribute(){ return max(0, min(5, (int) floor($this->rating))); }
}
