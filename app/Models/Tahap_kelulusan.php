<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tahap_kelulusan extends Model
{
    use HasFactory;


    public function ProsesKelulusan(){
        return $this->belongsTo(ProsesKelulusan::class, 'prosesKelulusan_id');
    }

    public function kategoriPengguna(){
        return $this->belongsTo(KategoriPengguna::class, 'user_category');
    }

    public function kelulusanBorang(){
        return $this->hasMany(Kelulusan_borang::class, 'tahapKelulusan_id');
    }

    public function surat(){
        return $this->hasOne(Surat::class);
    }

    public function borangs(){
        return $this->hasOnethrough(ProsesKelulusan::class, Borang::class);
    }

    public function jawapan(){
        return $this->hasOnethrough(Jawapan::class, Kelulusan_borang::class);
    }
}

