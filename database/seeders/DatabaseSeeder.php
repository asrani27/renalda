<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(PendampingSeeder::class);
        $this->call(BantuanSeeder::class);
        $this->call(CalonPenerimaSeeder::class);
        $this->call(PenerimaSeeder::class);
        $this->call(JadwalPenyaluranSeeder::class);
        $this->call(PenyaluranBantuanSeeder::class);
        $this->call(SerahTerimaSeeder::class);
        $this->call(MonitoringSeeder::class);
    }
}
