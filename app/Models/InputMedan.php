<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InputMedan extends Model
{
    use HasFactory;

    public function MedanPO(){
        return $this->belongsTo(MedanPO::class, 'MedanPO_id');
    }

    public function TindakanTugasan(){
        return $this->belongsTo(TindakanTugasan::class, 'tindakanTugasan_id');
    }

}
