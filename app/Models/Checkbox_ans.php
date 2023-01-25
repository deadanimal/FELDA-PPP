<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkbox_ans extends Model
{
    use HasFactory;
    protected $table = 'checkbox_ans';

    public function chckbox(){
        return $this->belongsTo(checkbox::class, 'checkbox_id');

    }
    public function kategori(){
        return $this->belongsTo(KategoriPengguna::class, 'kategori_id');

    }
}
