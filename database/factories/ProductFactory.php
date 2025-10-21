<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        return [
            'category_id' => Category::inRandomOrder()->first()->id ?? 1,
            'name'        => fake()->words(3, true),
            'slug'        => fake()->unique()->slug,
            'description' => fake()->sentence(),
            'price'       => fake()->numberBetween(50000, 500000),
            'stock'       => fake()->numberBetween(1, 100),
            'images'      => [fake()->imageUrl()],
            'is_active'   => true,
        ];
    }
}
