<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use OwenIt\Auditing\Contracts\Auditable;
// use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable implements Auditable
{
    // use LaratrustUserTrait;
    use \OwenIt\Auditing\Auditable;
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function kategori() {
        return $this->belongsTo(KategoriPengguna::class, 'kategoripengguna');
    }

    public function wilayah_id() {
        return $this->belongsTo(Wilayah::class,'wilayah');
    }

    public function rancangan_id() {
        return $this->belongsTo(Rancangan::class,'rancangan');
    }
    public function modul() {
        return $this->hasMany(Modul::class);
    }
  
    

}
