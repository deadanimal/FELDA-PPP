<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penerimaan_bekalan extends Model
{
    use HasFactory;

    public function Pemohonan_Peneroka() {
        return $this->belongsTo(Pemohonan_Peneroka::class, 'pemohonan_id');
    }
}
