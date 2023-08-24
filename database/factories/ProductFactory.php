<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            'productName'=>fake()->word(),
            'number'=>fake()->numberBetween(1,1000),
            'price'=>rand(1000 , 50000000),
            'color'=>fake()->colorName(),
            'productImage'=>fake()->url()
        ];
    }
}
