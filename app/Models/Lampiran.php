<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lampiran extends Model
{
    use HasFactory;

    public function Borang() {
        return $this->belongsTo(Borang::class, 'borang_id');
    }

    public function AppLampiran() {
        return $this->hasMany(AppLampiran::class);
    }
}
