<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductCategoriesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = \App\Models\ProductCategories::class;
    public function definition(): array
    {
        $productId = $this->faker->numberBetween(1, 10);
        $categoryId = $this->faker->numberBetween(1, 10);
        return [
            'product_id' => $productId,
            'category_id' => $categoryId
        ];
    }
}
