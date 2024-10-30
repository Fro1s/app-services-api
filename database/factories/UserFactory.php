<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

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

            'name' => 'Frois',
            'email' => 'matheus@gmail.com',
            'password' => Hash::make('123456789'),
            'phone_number' => '123456789',
            'user_type' => 'PROVIDER',
        ];
    }
}
