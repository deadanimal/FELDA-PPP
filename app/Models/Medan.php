<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medan extends Model
{
    use HasFactory;
    protected $table = 'medan';

    public function borang() {
        return $this->belongsTo(Borang::class, 'borang_id');
    }
    
    public function jawapan_medan() {
        return $this->hasMany(Jawapan_Medan::class);
    }

    public function checkbox() {
        return $this->hasMany(checkbox::class);
    }

    public function medanCategory() {
        return $this->belongsTo(medanCategory::class, 'category_id');
    }
    
}
