<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cuti>
 */
class CutiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $startDate = $this->faker->dateTimeBetween('-1 year', 'now');
        $endDate = $this->faker->dateTimeBetween($startDate, $startDate->format('Y-m-d').' +7 days');

        return [
            'Tanggal_Mulai' => $startDate->format('Y-m-d'),
            'Tanggal_Selesai' => $endDate->format('Y-m-d'),
            'Keterangan_Cuti' => $this->faker->randomElement([
                'Cuti Tahunan',
                'Cuti Sakit',
                'Cuti Melahirkan',
                'Cuti Urusan Keluarga',
                'Cuti Khusus'
            ]),
        ];
    }
}
