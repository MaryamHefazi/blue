<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Ybazli\Faker\Facades\Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'firstName' => Faker::firstName(),
            'lastName' => Faker::lastName(),
            'email' => fake()->unique()->safeEmail(),
            'nationalCode' =>rand(100000000,999999999),
            'gender' => 'male',
            'phoneNumber' =>fake()->phoneNumber(),
            'country'=> fake()->country(),
            'city' => fake()->city(),
            'address' => fake()->address(),
            'education' =>"Bachelor's degree",
            'job' => fake()->jobTitle(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ];
    }
}
