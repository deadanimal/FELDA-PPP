<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerkaraTugasan_Progress extends Model
{
    use HasFactory;

    protected $table = 'perkara_tugasan_progress';

    public function PerkaraTugasan(){
        return $this->belongsTo(Perkara_Tugasan::class, 'perkara_tugasan');

    }
    
}
