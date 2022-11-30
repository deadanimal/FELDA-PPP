<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Modul extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
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
