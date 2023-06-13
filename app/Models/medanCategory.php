<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class medanCategory extends Model
{
    use HasFactory;

    public function borang() {
        return $this->hasMany(Medan::class);
    }
}
