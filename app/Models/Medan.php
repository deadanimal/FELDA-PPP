<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medan extends Model
{
    use HasFactory;

    public function borang() {
        return $this->belongsTo(Borang::class, 'borang_id');
    }
    
}
