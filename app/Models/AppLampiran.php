<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppLampiran extends Model
{
    use HasFactory;

    public function Lampiran() {
        return $this->belongsTo(Lampiran::class, 'lampiran_id');
    }

    public function jawapan() {
        return $this->belongsTo(Jawapan::class, 'jawapan_id');
    }
}
