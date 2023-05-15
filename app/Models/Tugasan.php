<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tugasan extends Model
{
    use HasFactory;

    public function Borang(){
        return $this->belongsTo(Borang::class, 'borang_id');
    }

    public function KategoriPengguna(){
        return $this->belongsTo(KategoriPengguna::class, 'userCategory_id');
    }

    public function MedanPO(){
        return $this->hasMany(MedanPO::class);
    }
    
}
