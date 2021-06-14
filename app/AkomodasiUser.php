<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AkomodasiUser extends Model
{
    protected $fillable = [
        'id_akomodasi', 'id_user' 
    ];
}
