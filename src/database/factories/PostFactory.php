<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array {
        return [
            'user_id' => $this->faker->numberBetween(1, 5),
            'title'   => $this->faker->text(32),
            'content' => $this->faker->text(128),
        ];
    }
}
