<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Penggajian>
 */
class PenggajianFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $gajiPokok = $this->faker->numberBetween(3000000, 10000000);
        $potongan = $this->faker->numberBetween(0, 1000000);
        $bonus = $this->faker->numberBetween(0, 2000000);

        return [
            'Gaji_Pokok' => $gajiPokok,
            'Potongan' => $potongan,
            'Bonus' => $bonus,
            'Catatan' => $this->faker->optional()->sentence,
        ];
    }
}
