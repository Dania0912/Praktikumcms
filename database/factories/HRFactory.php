<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HR>
 */
class HRFactory extends Factory
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
            'Jabatan' => $this->faker->randomElement([
                'HR Manager',
                'HR Officer',
                'Recruitment Specialist',
                'Training & Development',
                'Compensation & Benefits'
            ]),
        ];
    }
}
