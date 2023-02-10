<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jawapan extends Model
{
    use HasFactory;
    protected $table = 'jawapan';

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function borangs(){
        return $this->belongsTo(Borang::class, 'borang_id');
    }

    public function jawapanMedan(){
        return $this->hasMany(Jawapan_medan::class);
    }

    public function kelulusanBorang(){
        return $this->hasMany(Kelulusan_borang::class);
    }

    public function tahapKelulusan(){
        return $this->hasManythrough(Tahap_kelulusan::class, Kelulusan_borang::class);
    }
}

