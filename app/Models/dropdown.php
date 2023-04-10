<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dropdown extends Model
{
    use HasFactory;

    protected $table = 'dropdowns';

    public function item(){
        return $this->belongsTo(Item::class, 'item_id');
    }
}
