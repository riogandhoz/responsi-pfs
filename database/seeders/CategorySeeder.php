<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            'Brownies Kukus' => 'brownies-kukus',
            'Brownies Panggang' => 'brownies-panggang',
            'Brownies Oven' => 'brownies-oven'
        ];

        foreach ($categories as $name => $slug) {
            Category::create([
                'name' => $name,
                'slug' => $slug
            ]);
        }
    }
}