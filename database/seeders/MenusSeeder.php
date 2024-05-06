<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $menus = [
            [
                'name' => 'Home',
                'slug' => 'home',
                'access' => 'seller,admin,super-admin,customer-service',
                'status' => 'active'
            ],
            [
                'name' => 'Products',
                'slug' => 'products',
                'access' => 'seller,admin,super-admin',
                'status' => 'active'
            ],
            [
                'name' => 'Transactions',
                'slug' => 'transactions',
                'access' => 'seller',
                'status' => 'active',
            ],
            [
                'name' => 'Accounts',
                'slug' => 'accounts',
                'access' => 'admin,super-admin,customer-service',
                'status' => 'active',
            ]
        ];

        foreach ($menus as $menu) {
            Menu::insert([
                'uuid' => uuid_create(),
                'name' => $menu['name'],
                'slug' => $menu['slug'],
                'access' => $menu['access'],
                'status' => $menu['status'],
                'created_at' => now(),
            ]);
        }
    }
}
