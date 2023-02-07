<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class borangJawapan extends Model
{
    use HasFactory;
    protected $table = 'borang_jawapan';

    public function user(){
        return $this->belongsTo(User::class, 'userid');
    }

    public function borangs(){
        return $this->belongsTo(Borang::class, 'borang_id');
    }
}

