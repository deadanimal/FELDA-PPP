<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hantar_Surat extends Model
{
    use HasFactory;

    public function jawapan(){
        return $this->belongsTo(Jawapan::class, 'jawapan_id');
    }
    
    public function surat(){
        return $this->belongsTo(Surat::class, 'surat_id');
    }
    
    public function KategoriPengguna(){
        return $this->belongsTo(KategoriPengguna::class, 'userCategory_id');
    }
    
    
}
