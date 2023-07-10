<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tindakan_progress extends Model
{
    use HasFactory;

    public function TindakanTugasan(){
        return $this->belongsTo(TindakanTugasan::class, 'tindakan_id');
    }
}
