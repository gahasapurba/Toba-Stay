<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Akomodasi extends Model
{
    protected $fillable = [
        'nama_akomodasi', 'jenis_akomodasi', 'kecamatan', 'alamat', 'deskripsi_akomodasi', 'harga_hari', 'harga_bulan', 'status_akomodasi', 'ukuran', 'stok', 'img_akomodasi', 'fasilitas'
    ];
}
