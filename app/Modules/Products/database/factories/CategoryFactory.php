<?php

namespace App\Modules\Products\database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;


class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'description' => $this->faker->sentence,
        ];
    }
}
