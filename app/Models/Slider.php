<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $table = 'Sliders';

    public function item(){
        return $this->belongsTo(Item::class, 'item_id');
    }
}
