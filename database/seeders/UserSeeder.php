<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@laundry.id',
            'password' => bcrypt('12345678'),
        ]);

        $admin->assignRole('admin');
        
        $admin = User::create([
            'name' => 'Pegawai',
            'email' => 'pegawai@laundry.id',
            'password' => bcrypt('12345678'),
        ]);

        $admin->assignRole('pegawai');
        
        $admin = User::create([
            'name' => 'Pelanggan Satu',
            'email' => 'pelanggan1@laundry.id',
            'password' => bcrypt('12345678'),
        ]);

        $admin->assignRole('pelanggan');
        
        $admin = User::create([
            'name' => 'Pelanggan Dua',
            'email' => 'pelanggan2@laundry.id',
            'password' => bcrypt('12345678'),
        ]);

        $admin->assignRole('pelanggan');
    }
}
