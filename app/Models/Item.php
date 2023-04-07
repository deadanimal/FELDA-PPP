<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    public function page(){
        return $this->belongsTo(Page::class, 'page_id');
    }

    public function card(){
        return $this->hasMany(cards::class);
    }

    public function dropdown(){
        return $this->hasMany(dropdown::class);
    }

    public function article(){
        return $this->hasMany(article::class);
    }

    public function slider(){
        return $this->hasMany(Slider::class);
    }
}
