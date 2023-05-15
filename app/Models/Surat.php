<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    use HasFactory;

    public function Tahap_kelulusan(){
        return $this->belongsTo(Tahap_kelulusan::class, 'kelulusan_id');
    }

    public function hantarSurat(){
        return $this->hasOne(Hantar_Surat::class);
    }
}
