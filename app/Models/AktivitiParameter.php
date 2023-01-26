<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AktivitiParameter extends Model
{
    use HasFactory;
    protected $table='aktiviti_parameters';

    public function aktiviti() {
        return $this->belongsTo(Aktiviti::class, 'aktiviti');
    }
}
