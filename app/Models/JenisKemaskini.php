<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisKemaskini extends Model
{
    use HasFactory;

    public function jenisTernakan() {
        return $this->belongsTo(jenis_ternakan::class, 'id_jenisTernakans');
    }

    public function aktiviti() {
        return $this->hasMany(Aktiviti::class);
    }
}
