<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
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
    public function definition(): array
    {
        return [
            'user_name' => fake()->userName(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'home_page' => fake('uk_UA')->url(),
            'password' => Hash::make('test1234'),
            'remember_token' => Str::random(10),
        ];
    }

    public function withEmail(string $email) 
    {
        return $this->state(function (array $attrs) use ($email) {
            return [
                'email' => $email
            ];
        });
    }
}
