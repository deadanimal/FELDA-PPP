<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tugasan_ans extends Model
{
    use HasFactory;
    protected $table = 'tugasan_ans';

    public function tugasan(){
        return $this->belongsTo(Tugasan::class, 'tugasan');

    }

    public function user(){
        return $this->belongsTo(User::class, 'userid');

    }
}
