<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organisasi extends Model
{
    use HasFactory;

    protected $table = "Organisasi";

    public function Organisasi_users() {
        return $this->hasMany(Organisasi_users::class);
    }

}
