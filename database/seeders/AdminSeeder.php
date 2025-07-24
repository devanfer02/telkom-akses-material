<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Abduh',
            'email' => 'budisan@telkom.ac.id',
            'password' => Hash::make('rahasia'),
            'role' => 'admin',
            'gender' => 1, // 1 for male
            'city' => 'Madiun',
        ]);

        User::create([
            'name' => 'Siti Aminah',
            'email' => 'sitiam@telkom.ac.id',
            'password' => Hash::make('secret'),
            'role' => 'admin',
            'gender' => 0, // 0 for female
            'city' => 'Surabaya',
        ]);

        User::create([
            'name' => 'Joko Widodo',
            'email' => 'jokow@telkom.ac.id',
            'password' => Hash::make('teknisi'),
            'role' => 'technician',
            'gender' => 1, // 1 for male
            'city' => 'Solo',
        ]);
    }
}

