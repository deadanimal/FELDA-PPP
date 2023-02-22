<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jenis_ternakan extends Model
{
    use HasFactory;

    public function proses() {
        return $this->belongsTo(Proses::class, 'proses_id');
    }

    public function JenisKemaskini() {
        return $this->hasMany(JenisKemaskini::class);
    }
}
