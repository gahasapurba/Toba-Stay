<?php

use Illuminate\Database\Seeder;

class AkomodasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('akomodasis')->insert([
            'nama_akomodasi' => 'Kos test', 
            'jenis_akomodasi' => 'kos', 
            'alamat' => 'Jalan SM Raja no.1', 
            'kecamatan' => 'Balige', 
            'deskripsi_akomodasi' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 
            'harga_bulan' => '500000', 
            'status_akomodasi' => 'ver', 
            'ukuran' => '3x3', 
            'stok' => '2', 
            'img_akomodasi' => 'kos.jpg', 
        ]);
     
        DB::table('akomodasi_users')->insert([
            'id_akomodasi' => '1',
            'id_user' => '2',
        ]);
        DB::table('akomodasis')->insert([
            'nama_akomodasi' => 'Kontrakan test', 
            'jenis_akomodasi' => 'kontrakan', 
            'alamat' => 'Jalan test', 
            'kecamatan' => 'Laguboti', 
            'deskripsi_akomodasi' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 
            'harga_bulan' => '2000000', 
            'status_akomodasi' => 'ver', 
            'ukuran' => '20x20', 
            'stok' => '2', 
            'img_akomodasi' => 'kontrakan.jpg', 
        ]);
        DB::table('akomodasi_users')->insert([
            'id_akomodasi' => '2',
            'id_user' => '2',
        ]);
   
        DB::table('akomodasis')->insert([
            'nama_akomodasi' => 'Homestay test', 
            'jenis_akomodasi' => 'homestay', 
            'alamat' => 'Jalan testt', 
            'kecamatan' => 'Balige', 
            'deskripsi_akomodasi' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 
            'harga_hari' => '1000000', 
            'status_akomodasi' => 'ver', 
            'ukuran' => '10x10', 
            'stok' => '2', 
            'img_akomodasi' => 'homestay.jpg', 
        ]);
        DB::table('akomodasi_users')->insert([
            'id_akomodasi' => '3',
            'id_user' => '2',
        ]);
   
        
    }
}
