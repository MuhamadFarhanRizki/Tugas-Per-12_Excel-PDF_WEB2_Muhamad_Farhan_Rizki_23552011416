<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Mahasiswa;

class MahasiswaSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['nim' => '2201001', 'nama' => 'Andi Saputra', 'email' => 'andi@gmail.com', 'id_jurusan' => 1],
            ['nim' => '2201002', 'nama' => 'Budi Santoso', 'email' => 'budi@gmail.com', 'id_jurusan' => 2],
            ['nim' => '2201003', 'nama' => 'Citra Lestari', 'email' => 'citra@gmail.com', 'id_jurusan' => 3],
            ['nim' => '2201004', 'nama' => 'Dewi Anggraini', 'email' => 'dewi@gmail.com', 'id_jurusan' => 4],
            ['nim' => '2201005', 'nama' => 'Eko Prasetyo', 'email' => 'eko@gmail.com', 'id_jurusan' => 5],
            ['nim' => '2201006', 'nama' => 'Fajar Nugroho', 'email' => 'fajar@gmail.com', 'id_jurusan' => 6],
            ['nim' => '2201007', 'nama' => 'Gina Putri', 'email' => 'gina@gmail.com', 'id_jurusan' => 7],
            ['nim' => '2201008', 'nama' => 'Hadi Wijaya', 'email' => 'hadi@gmail.com', 'id_jurusan' => 8],
            ['nim' => '2201009', 'nama' => 'Indah Sari', 'email' => 'indah@gmail.com', 'id_jurusan' => 9],
            ['nim' => '2201010', 'nama' => 'Joko Susilo', 'email' => 'joko@gmail.com', 'id_jurusan' => 10],
        ];

        foreach ($data as $mhs) {
            Mahasiswa::create($mhs);
        }
    }
}
