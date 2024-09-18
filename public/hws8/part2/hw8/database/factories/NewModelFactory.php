<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\NewModel>
 */
class NewModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'summary' => $this->faker->sentence(),
            'short_description' => $this->faker->paragraph(),
            'full_text' => $this->faker->paragraph()
        ];
    }

}
