<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'price' => $this->faker->randomFloat(2, 10, 100),
            'description' => $this->faker->paragraph,
            'photo' => $this->faker->imageUrl(),
            'number_of_purchase' => $this->faker->numberBetween(0, 100),
            'number_in_stock' => $this->faker->numberBetween(0, 50),
            'number_of_rate' => $this->faker->numberBetween(0, 50),
            'rate' => $this->faker->randomFloat(1, 1, 5),
            'salesman_id' => $this->faker->numberBetween(7, 11),
        ];
    }
}
