<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class borangJawapan extends Model
{
    use HasFactory;
    protected $table = 'borang_jawapan';
    protected $with = ['user'];

    public function user(){
        return $this->belongsTo(User::class, 'userid');
    }

    public function medans(){
        return $this->belongsTo(Medan::class, 'medan');
    }
}
