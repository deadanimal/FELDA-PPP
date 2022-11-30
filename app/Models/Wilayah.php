<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Wilayah extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;

    protected $table = 'Wilayah';

    public function user() {
        return $this->hasMany(User::class);
    }

    public function rancangan() {
        return $this->hasMany(Rancangan::class);
    }
}
