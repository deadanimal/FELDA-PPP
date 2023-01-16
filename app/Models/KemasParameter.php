<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KemasParameter extends Model
{
    use HasFactory;

    public function kemaskini() {
        return $this->belongsTo(JenisKemaskini::class, 'kemas_id');
    }
}
