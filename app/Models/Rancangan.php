<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rancangan extends Model 
{
    use HasFactory;
    protected $table = 'rancangan';

    public function wilayah() {
        return $this->belongsTo(Wilayah::class);
    }
    public function user() {
        return $this->hasMany(User::class);
    }

    public function jawapan(){
        return $this->hasMany(Jawapan::class);
    }
    
}
