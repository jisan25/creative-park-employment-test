<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductFeaturesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = \App\Models\ProductFeatures::class;
    public function definition(): array
    {
        $productId = $this->faker->numberBetween(1, 10);
        $featureId = $this->faker->numberBetween(1, 6);
        return [
            'product_id' => $productId,
            'feature_id' => $featureId
        ];
    }
}
