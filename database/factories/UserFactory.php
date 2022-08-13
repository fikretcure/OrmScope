<?php

namespace Database\Factories;

use App\Models\Perfection;
use App\Models\Position;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'first_name' => fake()->unique()->firstName(),
            'last_name' => fake()->lastName(),
            'city' => fake()->city(),
            'age' => rand(18, 23),
            'positions_id' => Position::inRandomOrder()->first("id"),
            'perfections_id' => Perfection::inRandomOrder()->first("id"),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
