<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Karyawan>
 */
class KaryawanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Nama' => $this->faker->name,
            'Tanggal_Lahir' => $this->faker->date('Y-m-d'),
            'Alamat' => $this->faker->address,
            'Jabatan' => $this->faker->jobTitle,
            'Riwayat_Pekerjaan' => $this->faker->paragraph,
        ];
    }
}
