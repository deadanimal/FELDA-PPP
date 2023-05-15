<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borang extends Model
{
    use HasFactory;

    public function proses() {
        return $this->belongsTo(Proses::class, 'proses_id');
    }

    public function medan() {
        return $this->hasMany(Medan::class);
    }

    public function jwpn(){
        return $this->hasMany(Jawapan::class);

    }
    public function MedanPO(){
        return $this->hasMany(MedanPO::class);

    }
}
