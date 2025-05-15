<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('karyawans')->insert([
            [
                'nama' => 'Siti Aminah',
                'tanggal_lahir' => '1990-04-15',
                'alamat' => 'Jl. Melati No. 10, Jakarta',
                'jabatan' => 'Manager HRD',
                'riwayat_pekerjaan' => 'PT Abadi Jaya (2010-2015), PT Maju Mundur (2016-2020)',
            ],
            [
                'nama' => 'Budi Santoso',
                'tanggal_lahir' => '1985-07-23',
                'alamat' => 'Jl. Kenanga No. 5, Bandung',
                'jabatan' => 'Software Engineer',
                'riwayat_pekerjaan' => 'PT Teknologi Canggih (2012-2019), PT Digital Nusantara (2020-2024)',
            ],
            [
                'nama' => 'Maria Fransiska',
                'tanggal_lahir' => '1992-12-08',
                'alamat' => 'Jl. Mawar No. 3, Surabaya',
                'jabatan' => 'Akuntan',
                'riwayat_pekerjaan' => 'PT Akuntansi Hebat (2015-2023)',
            ],
        ]);

    }
}
