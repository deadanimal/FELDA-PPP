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

    public function Acceptance(){
        return $this->hasMany(Acceptance::class);
    }

    public function ProsesKelulusan(){
        return $this->hasOne(ProsesKelulusan::class);
    }
    
    public function Perkara_Pemohonan(){
        return $this->hasMany(Perkara_Pemohonan::class);
    }
}
