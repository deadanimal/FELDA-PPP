<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proses extends Model
{
    use HasFactory;
    protected $table = 'proses';

    public function modul() {
        return $this->belongsTo(Modul::class, 'modul_id');
    }
    
    public function borang() {
        return $this->hasMany(Borang::class, 'borang');
    }

    public function tugas() {
        return $this->hasMany(Tugasan::class);
    }

    public function aktiviti() {
        return $this->hasMany(aktivit::class);
    }
}
