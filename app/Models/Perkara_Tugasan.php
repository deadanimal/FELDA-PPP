<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perkara_Tugasan extends Model
{
    use HasFactory;
    protected $table = 'perkara_tugasan';

    public function tugasan(){
        return $this->belongsTo(Tugasan::class, 'tugasan_id');

    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');

    }
}
