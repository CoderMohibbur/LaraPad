<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
        'parent_id','title','url','menu_type','location',
        'sort_order','is_active','target','icon',
    ];

    public function parent() { return $this->belongsTo(Menu::class, 'parent_id'); }

    public function children()
    {
        return $this->hasMany(Menu::class, 'parent_id')
            ->orderBy('sort_order');
    }

    public function scopeHeader($q)
    {
        return $q->where('location', 'header')
                 ->where('is_active', 1);
    }
}
