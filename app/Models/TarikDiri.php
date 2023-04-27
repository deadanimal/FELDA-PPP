<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TarikDiri extends Model
{
    use HasFactory;

    public function jawapan(){
        return $this->belongsTo(Jawapan::class, 'jawapan_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function pegganti(){
        return $this->belongsTo(User::class, 'pegganti_id');
    }
}
