<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemohonan_Peneroka extends Model
{
    use HasFactory;

    public function Perkara_Pemohonan() {
        return $this->belongsTo(Perkara_Pemohonan::class, 'perkara_id');
    }
    
    public function jawapan() {
        return $this->belongsTo(Jawapan::class, 'jawapan_id');
    }

    public function Penerimaan_bekalan(){
        return $this->hasOne(Penerimaan_bekalan::class, 'permohonan_id', 'id');
    }
}
