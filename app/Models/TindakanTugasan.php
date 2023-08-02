<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TindakanTugasan extends Model
{
    use HasFactory;

    protected $table="tindakan_tugasans";

    public function Tugasan(){
        return $this->belongsTo(Tugasan::class, 'tugasan_id');
    }

    public function Jawapan(){
        return $this->belongsTo(Jawapan::class, 'jawapan_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function InputMedan(){
        return $this->hasMany(InputMedan::class, 'tindakanTugasan_id', 'id');
    }

    public function TindakanProgress(){
        return $this->hasMany(Tindakan_progress::class, 'tindakan_id', 'id');
    }
}
