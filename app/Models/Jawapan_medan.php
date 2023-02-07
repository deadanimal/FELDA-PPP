<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jawapan_medan extends Model
{
    use HasFactory;

    public function borangJawapan() {
        return $this->belongsTo(borangJawapan::class, 'jawapan_id');
    }
    
    public function medan() {
        return $this->belongsTo(Medan::class,'medan_id');
    }
}
