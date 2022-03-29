<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
           'name' => $this->faker->words(4, true),
           'image' => $this->faker->imageUrl(),
           'description' => $this->faker->text(),
           'price' => $this->faker->numberBetween(10, 100),
           'discount' => $this->faker->numberBetween(10, 20),
           'category_id' => $this->faker->numberBetween(1, 20),
           'company_id' => $this->faker->numberBetween(1, 20),
        ];
    }
}
