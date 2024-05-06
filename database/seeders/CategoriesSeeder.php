<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'user_id' => 2,
                'name' => 'Fashion',
            ],
            [
                'user_id' => 2,
                'name' => 'Electronics',
            ],
            [
                'user_id' => 2,
                'name' => 'Home Decor',
            ],
        ];

        foreach ($categories as $category) {
            Category::insert([
                'uuid' => uuid_create(),
                'user_id' => $category['user_id'],
                'name' => $category['name'],
                'slug' => Str::slug($category['name']),
                'status' => 'active'
            ]);
        }
    }
}
