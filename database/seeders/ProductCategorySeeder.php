<?php

namespace Database\Seeders;

use App\Models\ProductCategories;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductCategories::factory()->count(25)->create();
    }
}
