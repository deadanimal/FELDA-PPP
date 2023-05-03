<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Respond_aduan extends Model
{
    use HasFactory;

    public function Aduan() {
        return $this->belongsTo(Aduan::class,'aduan_id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
