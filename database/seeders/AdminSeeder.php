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
            'no_hp' => '081234567890',
            'password' => Hash::make('rahasia'),
            'gender' => 1, // 1 for male
            'role' => 'admin',
            'city' => 'Madiun',
        ]);

        User::create([
            'name' => 'Siti Aminah',
            'no_hp' => '081234567891',
            'password' => Hash::make('secret'),
            'gender' => 0, // 0 for female
            'role' => 'admin',
            'city' => 'Surabaya',
        ]);

        User::create([
            'name' => 'Joko Widodo',
            'no_hp' => '081234567892',
            'password' => Hash::make('teknisi'),
            'gender' => 1, // 1 for male
            'role' => 'technician',
            'city' => 'Solo',
        ]);
    }
}
