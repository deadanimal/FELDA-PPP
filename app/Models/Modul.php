<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modul extends Model 
{
    use HasFactory;

    public function userDiciptaOleh() {
        return $this->belongsTo(User::class, 'diciptaOleh');
    }

    public function userDikemaskiniOleh() {
        return $this->belongsTo(User::class, 'dikemaskiniOleh');
    }

    public function proses() {
        return $this->hasMany(Proses::class);
    }
}
