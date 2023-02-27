<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aktiviti extends Model
{
    use HasFactory;
    protected $table='aktivitis';

    public function kemaskini() {
        return $this->belongsTo(JenisKemaskini::class, 'id_jenisKemaskini');
    }

    public function param() {
        return $this->hasMany(Aktiviti_parameter::class);
    }

}
