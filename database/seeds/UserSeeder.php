<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'nama_user' => 'admin', 
            'email' => 'admin@admin.com', 
            'no_hp' => '0813900099', 
            'password' => Hash::make('admin1234'), 
            'img_user' => 'admin.jpg', 
            'role' => 'admin', 
            'gender' => 'pria',
            'status_user' => 'ver',
            'img_ktp' => 'ktp.jpg',
        ]);

        DB::table('users')->insert([
            'nama_user' => 'penyedia oye', 
            'email' => 'penyedia@gmail.com', 
            'no_hp' => '12345678', 
            'password' => Hash::make('penyedia'), 
            'img_user' => '1.jpg', 
            'role' => 'penyedia', 
            'gender' => 'wanita',
            'status_user' => 'ver',
            'img_ktp' => 'ktp.jpg',
        ]);

        DB::table('users')->insert([
            'nama_user' => 'penyewa garit', 
            'email' => 'penyewa@gmail.com', 
            'no_hp' => '123456789', 
            'password' => Hash::make('penyewa'), 
            'img_user' => 'garit.jpg', 
            'role' => 'penyewa', 
            'gender' => 'pria',
            'status_user' => 'ver',
            'img_ktp' => 'ktp.jpg',
        ]);
    }
}
