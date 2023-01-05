<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wilayah extends Model
{
    use HasFactory;

    protected $table = 'Wilayah';

    public function user() {
        return $this->hasMany(User::class);
    }

    public function rancangan() {
        return $this->hasMany(Rancangan::class);
    }
}
