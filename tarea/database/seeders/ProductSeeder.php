<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $categories = Category::all();

        // Create products and attach random categories
        Product::factory()->count(30)->make()->each(function ($product) use ($categories) {
            $product->category_id = $categories->random()->id ?? null;
            $product->save();
        });
    }
}
