<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $table = 'Gallery';

    public function item(){
        return $this->belongsTo(Item::class, 'item_id');
    }

    public function picture(){
        return $this->hasMany(Picture::class);
    }
}
