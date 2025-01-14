<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $kukusCategory = Category::where('slug', 'brownies-kukus')->first()->id;
        $panggang = Category::where('slug', 'brownies-panggang')->first()->id;
        $oven = Category::where('slug', 'brownies-oven')->first()->id;

        $products = [
            [
                'name' => 'Brownies Coklat Kukus',
                'description' => 'Steamed Chocolate Brownies',
                'price' => 50000.00,
                'stock' => 100,
                'category_id' => $kukusCategory
            ],
            [
                'name' => 'Brownies Keju Kukus',
                'description' => 'Steamed Cheese Brownies',
                'price' => 55000.00,
                'stock' => 100,
                'category_id' => $kukusCategory
            ],
            [
                'name' => 'Brownies Matcha Kukus',
                'description' => 'Steamed Matcha Brownies',
                'price' => 60000.00,
                'stock' => 100,
                'category_id' => $kukusCategory
            ],
            [
                'name' => 'Brownies Coklat Panggang',
                'description' => 'Baked Chocolate Brownies',
                'price' => 45000.00,
                'stock' => 100,
                'category_id' => $panggang
            ],
            [
                'name' => 'Brownies Keju Panggang',
                'description' => 'Baked Cheese Brownies',
                'price' => 50000.00,
                'stock' => 100,
                'category_id' => $panggang
            ],
            [
                'name' => 'Brownies Oreo Panggang',
                'description' => 'Baked Oreo Brownies',
                'price' => 47000.00,
                'stock' => 100,
                'category_id' => $panggang
            ],
            [
                'name' => 'Brownies Coklat Oven',
                'description' => 'Chocolate Brownies in the Oven',
                'price' => 45000.00,
                'stock' => 100,
                'category_id' => $oven
            ],
            [
                'name' => 'Brownies Keju Oven',
                'description' => 'Cheese Brownies in the Oven',
                'price' => 50000.00,
                'stock' => 100,
                'category_id' => $oven
            ],
            [
                'name' => 'Brownies Red Velvet Oven',
                'description' => 'Red Velvet Brownies in the Oven',
                'price' => 55000.00,
                'stock' => 100,
                'category_id' => $oven
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}