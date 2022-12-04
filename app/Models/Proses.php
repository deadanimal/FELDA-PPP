<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Proses extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;

    public function modul() {
        return $this->belongsTo(Modul::class, 'modul');
    }
    
    public function borang() {
        return $this->hasMany(Borang::class, 'borang');
    }
}
