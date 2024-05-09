<?php

namespace Database\Seeders;

use App\Models\ProductFeatures;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductFeaturesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductFeatures::factory()->count(15)->create();
    }
}
