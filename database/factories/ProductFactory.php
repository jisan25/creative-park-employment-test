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
    protected $model = \App\Models\Product::class;
    public function definition(): array
    {
        $title = 'Demo product title ' . ($this->faker->unique()->numberBetween(1, 100));

        return [
            'title' => $title,
            'image' => 'placeholder.jpeg',
            'creator_id' => 2
        ];
    }
}
