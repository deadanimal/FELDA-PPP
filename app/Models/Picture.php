<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    use HasFactory;

    public function Gallery(){
        return $this->belongsTo(Gallery::class, 'gallery_id');
    }
}
