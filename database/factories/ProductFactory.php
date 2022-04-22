<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition() {
        return [
            'name' => $this->faker->words(2, true),
            'slug' => $this->faker->slug(2, true),
            'description' => $this->faker->paragraphs(3, true),
            'category_id' => $this->faker->randomDigitNotNull(),
            'regular_price' => $this->faker->randomFloat(2, 10, 400),
            'sale_price' => $this->faker->randomFloat(2, 5, 300),
            'quantity' => $this->faker->randomDigit(),
            'stock_status' => $this->faker->randomElement([
                'instock',
                'outofstock'
            ]),
        ];
    }
}
