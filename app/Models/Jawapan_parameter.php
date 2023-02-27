<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jawapan_parameter extends Model
{
    use HasFactory;
    protected $table = 'jawapan_parameters';

    public function users() {
        return $this->belongsTo(User::class,'user_id');
    }

    public function AktivitiParameter() {
        return $this->belongsTo(AktivitiParameter::class,'aktivitiParameter_id');
    }

    public function wilayah() {
        return $this->hasOneThrough(Wilayah::class ,User::class, 'user_id', 'wilayah');
    }

    public function aktiviti() {
        return $this->hasOneThrough(Aktiviti::class, AktivitiParameter::class );
    }
}
