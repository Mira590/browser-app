<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    public function definition(): array
    {
        return [
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'email' => fake()->unique()->safeEmail(),
            'job_title' => fake()->jobTitle(),
            'username' => fake()->unique()->userName(),
            'phone' => fake()->optional()->phoneNumber(),
            'azbid' => fake()->optional()->regexify('[A-Z0-9]{8}'), // random 8-character string
            'role' => fake()->randomElement(['user', 'superuser', 'admin']),
            'bio' => fake()->optional()->paragraph(),
            'password' => Hash::make('password'), // default password for all
            'photo' => null, // can set fake path if needed
        ];
    }
}
