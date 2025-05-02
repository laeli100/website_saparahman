<?php

namespace Database\Seeders;

use App\Models\Kelas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=0; $i < 15; $i++) { 
            Kelas::create([
                'tingkatan'  => 'Madrasah Aliyah' . $i,
                'tingkat_kelas' => "10",
                'nama_kelas' => "A",
                'created_by' => "1"
            ]);
        }

    }
}
