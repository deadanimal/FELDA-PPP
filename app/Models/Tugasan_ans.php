<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tugasan_ans extends Model
{
    use HasFactory;
    protected $table = 'tugasan_ans';

    public function tugasan(){
        return $this->belongsTo(Tugasan::class, 'tugasan_id');

    }

    public function kategori(){
        return $this->belongsTo(KategoriPengguna::class, 'kategori_id');

    }
}
