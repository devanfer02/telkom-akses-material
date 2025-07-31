<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Material;
use Illuminate\Support\Facades\File;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFile = File::get(base_path('material.csv'));
        $data = array_map('str_getcsv', explode("\n", $csvFile));

        foreach ($data as $row) {
            if (count($row) > 1) {
                Material::create([
                    'name' => $row[1],
                    'quantity' => 100, // default value
                    'satuan' => 'pcs', // default value
                    'location' => 'Gudang Utama', // default value
                    'mitra' => 'Telkom', // default value
                    'teknisi' => 'Teknisi A', // default value
                    'status' => 'IN', // default value
                    'date' => now(), // default value
                    'keterangan' => $row[2] ?? '',
                    'evidence' => null, // default value
                ]);
            }
        }
    }
}
