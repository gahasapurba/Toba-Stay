<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $fillable = [
        'id_sewa', 'id_penyedia', 'img_pembayaran', 'status_pembayaran', 'batas_pembayaran'
    ];
}
