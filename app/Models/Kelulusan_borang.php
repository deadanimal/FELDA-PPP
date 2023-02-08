<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelulusan_borang extends Model
{
    use HasFactory;

    public function jawapan(){
        return $this->belongsTo(Jawapan::class, 'jawapan_id');
    }

    public function tahap_kelulusan(){
        return $this->belongsTo(Tahap_kelulusan::class, 'tahapKelulusan_id');
    }
}
