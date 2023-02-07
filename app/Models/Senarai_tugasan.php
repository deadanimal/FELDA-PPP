<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tugasan extends Model
{
    use HasFactory;
    protected $table = 'senarai_tugasan';


    public function proses() {
        return $this->belongsTo(Proses::class, 'proses_id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

}
