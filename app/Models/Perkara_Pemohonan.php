<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perkara_Pemohonan extends Model
{
    use HasFactory;

    public function borangs() {
        return $this->belongsTo(Borang::class, 'borang_id');
    }

    public function Pemohonan_Peneroka(){
        return $this->hasMany(Pemohonan_Peneroka::class);
    }
}
