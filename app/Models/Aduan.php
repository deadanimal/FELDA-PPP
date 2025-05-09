<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aduan extends Model
{
    use HasFactory;

    public function respond() {
        return $this->hasMany(Repond_aduan::class);
    }

    public function kategori() {
        return $this->belongsTo(KategoriPengguna::class, 'user_category');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function wilayah_id() {
        return $this->belongsTo(Wilayah::class,'wilayah');
    }

    public function rancangan_id() {
        return $this->belongsTo(Rancangan::class,'rancangan');
    }
}
