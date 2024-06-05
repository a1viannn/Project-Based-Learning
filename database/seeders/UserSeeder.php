<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin Aplikasi',
            'nim' => '362258302111',
            'prodi' => 'TRPL',
            'role' => 'admin',
            'email' => 'admin@ukmolahraga.com',
            'password' => bcrypt('admin'),
            'remember_token' => Str::random(60),

        ]);

        User::create([
            'name' => 'root',
            'nim' => '362258302222',
            'prodi' => 'TRPL',
            'role' => 'pengurus',
            'email' => 'root@email.com',
            'password' => bcrypt('root'),
            'remember_token' => Str::random(60),
        ]);

        User::create([
            'name' => 'Anggota',
            'nim' => '362258302867',
            'prodi' => 'TRPL',
            'role' => 'anggota',
            'email' => 'anggota@email.com',
            'password' => bcrypt('anggota'),
            'remember_token' => Str::random(60),
        ]);

        User::create([
            'name' => 'AnggotaPengurus',
            'nim' => '362258302454',
            'prodi' => 'TRPL',
            'role' => 'anggota',
            'email' => 'anggota@pengurus.com',
            'password' => bcrypt('12345678'),
            'remember_token' => Str::random(60),
        ]);


    }
}

