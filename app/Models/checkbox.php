<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class checkbox extends Model
{
    use HasFactory;
    protected $table = 'checkbox';

    public function medan(){
        return $this->belongsTo(Medan::class, 'medan_id');

    }
}
