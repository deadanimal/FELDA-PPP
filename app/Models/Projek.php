<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projek extends Model
{
    use HasFactory;

    public function modul() {
        return $this->belongsTo(Modul::class, 'modul_id');
    }

    public function Proses() {
        return $this->hasMany(Proses::class);
    }
}
