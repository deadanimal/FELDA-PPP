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
    public function user(){
        return $this->belongsTo(User::class, 'userid');

    }
}
