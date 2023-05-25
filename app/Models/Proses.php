<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proses extends Model
{
    use HasFactory;
    protected $table = 'proses';

    public function Projek() {
        return $this->belongsTo(Projek::class, 'projek_id');
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
