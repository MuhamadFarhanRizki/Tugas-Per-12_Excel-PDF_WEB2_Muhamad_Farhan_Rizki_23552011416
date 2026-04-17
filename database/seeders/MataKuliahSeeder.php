<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MataKuliah;

class MataKuliahSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['nama_matakuliah' => 'Pemrograman Web', 'sks' => 3, 'id_jurusan' => 1],
            ['nama_matakuliah' => 'Basis Data', 'sks' => 3, 'id_jurusan' => 2],
            ['nama_matakuliah' => 'Sistem Informasi', 'sks' => 2, 'id_jurusan' => 3],
            ['nama_matakuliah' => 'Elektronika Dasar', 'sks' => 3, 'id_jurusan' => 4],
            ['nama_matakuliah' => 'Mekanika Teknik', 'sks' => 2, 'id_jurusan' => 5],
            ['nama_matakuliah' => 'Manajemen Bisnis', 'sks' => 3, 'id_jurusan' => 6],
            ['nama_matakuliah' => 'Akuntansi Keuangan', 'sks' => 3, 'id_jurusan' => 7],
            ['nama_matakuliah' => 'Public Speaking', 'sks' => 2, 'id_jurusan' => 8],
            ['nama_matakuliah' => 'Hukum Perdata', 'sks' => 3, 'id_jurusan' => 9],
            ['nama_matakuliah' => 'Psikologi Umum', 'sks' => 2, 'id_jurusan' => 10],
        ];

        foreach ($data as $mk) {
            MataKuliah::create($mk);
        }
    }
}