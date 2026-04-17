<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Jurusan;

class JurusanSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['nama_jurusan' => 'Teknik Informatika', 'akreditasi' => 'A'],
            ['nama_jurusan' => 'Teknik Industri', 'akreditasi' => 'B'],
            ['nama_jurusan' => 'Sistem Informasi', 'akreditasi' => 'A'],
            ['nama_jurusan' => 'Teknik Elektro', 'akreditasi' => 'B'],
            ['nama_jurusan' => 'Teknik Mesin', 'akreditasi' => 'B'],
            ['nama_jurusan' => 'Manajemen', 'akreditasi' => 'A'],
            ['nama_jurusan' => 'Akuntansi', 'akreditasi' => 'A'],
            ['nama_jurusan' => 'Ilmu Komunikasi', 'akreditasi' => 'B'],
            ['nama_jurusan' => 'Hukum', 'akreditasi' => 'A'],
            ['nama_jurusan' => 'Psikologi', 'akreditasi' => 'B'],
        ];

        foreach ($data as $jrs) {
            Jurusan::create($jrs);
        }
    }
}