<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Gallery>
 */
class GalleryFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition() {
        return [
            'product_id' => $this->faker->numberBetween(1, 50),
            'image' => $this->faker->imageUrl(360, 360, 'animals', true),
            'main_thumb' => $this->faker->numberBetween(0, 1),
        ];
    }
}
