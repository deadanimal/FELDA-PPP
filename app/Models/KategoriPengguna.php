<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriPengguna extends Model
{
    use HasFactory;
    
    public function user() {
        return $this->hasMany(User::class);
    }
    public function tugasan() {
        return $this->hasMany(Tugasan::class);
    }
    public function kelulusan() {
        return $this->hasMany(Tahap_kelulusan::class);
    }
    public function aduan() {
        return $this->hasMany(Aduan::class);
    }

    public function hantarSurat(){
        return $this->hasMany(Hantar_Surat::class);
    }
}
