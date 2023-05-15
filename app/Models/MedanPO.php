<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedanPO extends Model
{
    use HasFactory;

    protected $table="medan_po";

    public function Tugasan(){
        return $this->belongsTo(Tugasan::class, 'tugasan_id');
    }
    public function InputMedan(){
        return $this->hasMany(InputMedan::class);
    }
}
