<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jawapan extends Model
{
    use HasFactory;
    protected $table = 'jawapan';

    public function user(){
        return $this->belongsTo(User::class, 'userid');
    }

    public function borangs(){
        return $this->belongsTo(Borang::class, 'borang_id');
    }

    public function kelulusan_borang(){
        return $this->hasOne(Borang::class, 'borang_id');
    }
}

