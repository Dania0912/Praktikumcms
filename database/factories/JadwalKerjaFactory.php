<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JadwalKerja>
 */
class JadwalKerjaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $tanggalMulai = $this->faker->dateTimeBetween('now', '+1 month');
        $tanggalSelesai = (clone $tanggalMulai)->modify('+1 day');

        $waktuMulai = $this->faker->dateTimeBetween('08:00:00', '10:00:00')->format('H:i:s');
        $waktuSelesai = $this->faker->dateTimeBetween('16:00:00', '18:00:00')->format('H:i:s');

        return [
            'Tanggal_Mulai' => $tanggalMulai->format('Y-m-d'),
            'Tanggal_Selesai' => $tanggalSelesai->format('Y-m-d'),
            'Waktu_Mulai' => $waktuMulai,
            'Waktu_Selesai' => $waktuSelesai,
        ];
    }
}
