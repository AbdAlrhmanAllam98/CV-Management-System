<?php

namespace Database\Factories;

use App\Models\CV;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CV>
 */
class SectionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'sectionTitle'=>fake()->word(),
            'cvId'=>CV::inRandomOrder()->pluck('id')->first(),
        ];
    }
}
