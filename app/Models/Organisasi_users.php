<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organisasi_users extends Model
{
    use HasFactory;

    protected $table = "organisasi_users";

    public function Organisasi() {
        return $this->belongsToMany(Organisasi::class, 'organisasi_id');
    }

    public function user_id() {
        return $this->belongsToMany(User::class, 'user_id');
    }    
}
