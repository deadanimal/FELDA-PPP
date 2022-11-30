<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Rancangan extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;
    protected $table = 'rancangan';

    public function wilayah() {
        return $this->belongsTo(Wilayah::class);
    }
    public function user() {
        return $this->hasMany(User::class);
    }
}
