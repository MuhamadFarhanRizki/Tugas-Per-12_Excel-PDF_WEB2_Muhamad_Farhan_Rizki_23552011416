<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'email' => 'farhan@gmail.com',
            'password' => 'farhan43' // otomatis ke-hash karena casts
        ]);

        $this->call([
            JurusanSeeder::class,
            MahasiswaSeeder::class,
            MataKuliahSeeder::class,
        ]);
    }
}
