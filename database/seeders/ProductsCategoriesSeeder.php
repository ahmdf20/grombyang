<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $produts_categories = [
            [
                'product_id' => 1,
                'categories' => [1, 2, 3],
            ],
            [
                'product_id' => 2,
                'categories' => [2, 3],
            ],
            [
                'product_id' => 3,
                'categories' => [1, 2, 3],
            ],
            [
                'product_id' => 4,
                'categories' => [1, 3],
            ],
            [
                'product_id' => 5,
                'categories' => [1, 2, 3],
            ],
            [
                'product_id' => 6,
                'categories' => [3],
            ],
            [
                'product_id' => 7,
                'categories' => [1],
            ],
            [
                'product_id' => 8,
                'categories' => [1, 3],
            ],
        ];
        foreach ($produts_categories as $product_category) {
            foreach ($product_category['categories'] as $category) {
                DB::table('products_categories')->insert([
                    'product_id' => $product_category['product_id'],
                    'category_id' => $category
                ]);
            }
        }
    }
}
