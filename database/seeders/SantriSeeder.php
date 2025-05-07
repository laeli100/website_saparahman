<?php

namespace Database\Seeders;

use App\Models\Santri;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SantriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=0; $i < 15; $i++) { 
            Santri::create([
                'nama_santri'  => 'Santri' . $i,
                'nisn' => "1223",
                'nis' => "67890",
                'nsm' => "4567",
                'npsm' => "5783",
                'id_kelas' => "1",
                'gender' => 'santriwan',
                'created_by' => "1",
                'updated_by' => "1",
                'deleted_by' => "1"
            ]);
        }
    }
}
