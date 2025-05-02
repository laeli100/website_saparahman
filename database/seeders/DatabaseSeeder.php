<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            SantriSeeder::class
        ]);

        $this->call([
            OrangTuaSeeder::class
        ]);

        $this->call([
            OrtuSantriSeeder::class
        ]);

        $this->call([
            GuruSeeder::class
        ]);

        $this->call([
            AdminSeeder::class
        ]);

        $this->call([
            KasusSeeder::class
        ]);

        $this->call([
            JenisKasusSeeder::class
        ]);

        $this->call([
            KelasSeeder::class
        ]);

        $this->call([
            MasterMapelSeeder::class
        ]);

        $this->call([
            MapelKelasSeeder::class
        ]);

        $this->call([
            MasterEkskulSeeder::class
        ]);

        $this->call([
            DetailEkskulRaportSeeder::class
        ]);

        $this->call([
            RaportSeeder::class
        ]);
    }
}
