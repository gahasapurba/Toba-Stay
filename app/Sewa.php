<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sewa extends Model
{
    protected $fillable = [
    'tanggal_masuk', 'tanggal_keluar', 'deskripsi', 'total_harga', 'durasi', 'status_sewa', 'img_sewa'
    ];
}
