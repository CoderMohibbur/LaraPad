<?php

// app/Models/Award.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Award extends Model
{
    use SoftDeletes;

    protected $fillable = ['title','image_path','image_url','year','order','is_active'];

    // active scope
    public function scopeActive($q){ return $q->where('is_active', true); }

    // ordered scope: order ↑, year ↓, id ↑
    public function scopeOrdered($q){
        return $q->orderBy('order')->orderByDesc('year')->orderBy('id');
    }

    // convenience accessor
    public function getImageSrcAttribute(){
        return $this->image_path
            ? asset('storage/'.$this->image_path)
            : ($this->image_url ?? '');
    }
}
