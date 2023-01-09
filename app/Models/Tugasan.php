<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tugasan extends Model
{
    use HasFactory;
    protected $table = 'tugasan';


    public function proses() {
        return $this->belongsTo(Proses::class, 'proses_id');
    }

    public function kategoriPengguna() {
        return $this->belongsTo(KategoriPengguna::class, 'userKategori');
    }
}
