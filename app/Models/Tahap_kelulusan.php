<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tahap_kelulusan extends Model
{
    use HasFactory;

    public function prosesKelulusan(){
        return $this->belongsTo(ProsesKelulusan::class, 'prosesKelulusan_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function kelulusanBorang(){
        return $this->hasMany(Kelulusan_borang::class);
    }

    public function borangs(){
        return $this->hasOnethrough(ProsesKelulusan::class, Borang::class);
    }

    public function jawapan(){
        return $this->hasOnethrough(Jawapan::class, Kelulusan_borang::class);
    }
}
