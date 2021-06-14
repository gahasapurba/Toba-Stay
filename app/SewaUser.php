<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SewaUser extends Model
{
    protected $fillable = [
        'id_sewa', 'id_user'
    ];
}
