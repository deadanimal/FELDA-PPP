<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acceptance extends Model
{
    use HasFactory;

    public function borangs(){
        return $this->belongsTo(Borang::class, 'borang_id');
    }
}
