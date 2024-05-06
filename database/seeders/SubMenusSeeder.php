<?php

namespace Database\Seeders;

use App\Models\SubMenu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubMenusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sub_menus = [
            [
                'menu_id' => 1,
                'name' => 'Dashboard',
                'slug' => 'dashboard',
                'icon' => '<i class="fa-solid fa-gauge-high"></i>',
                'url' => 'dashboard',
                'access' => 'seller,admin,super-admin',
                'status' => 'active',
            ],
            [
                'menu_id' => 2,
                'name' => 'Product',
                'slug' => 'product',
                'icon' => '<i class="fa-solid fa-cube"></i>',
                'url' => 'product.index',
                'access' => 'seller,admin,super-admin',
                'status' => 'active',
            ],
            [
                'menu_id' => 2,
                'name' => 'Category',
                'slug' => 'category',
                'icon' => '<i class="fa-solid fa-tags"></i>',
                'url' => 'category.index',
                'access' => 'admin,super-admin',
                'status' => 'active',
            ],
            [
                'menu_id' => 2,
                'name' => 'Restricted Product',
                'slug' => 'restricted-product',
                'icon' => '<i class="fa-solid fa-ban"></i>',
                'url' => 'product-restricted.index',
                'access' => 'admin,super-admin',
                'status' => 'active',
            ],
            [
                'menu_id' => 3,
                'name' => 'Order',
                'slug' => 'order',
                'icon' => '<i class="fa-solid fa-file-pen"></i>',
                'url' => 'order.index',
                'access' => 'seller',
                'status' => 'active',
            ],
            [
                'menu_id' => 3,
                'name' => 'PSR',
                'slug' => 'product-sales-report',
                'icon' => '<i class="fa-solid fa-chart-line"></i>',
                'url' => 'psr.index',
                'access' => 'seller',
                'status' => 'active',
            ],
            [
                'menu_id' => 4,
                'name' => 'Admin',
                'slug' => 'admin',
                'icon' => '<i class="fa-solid fa-user-shield"></i>',
                'url' => 'admin.index',
                'access' => 'super-admin',
                'status' => 'active',
            ],
            [
                'menu_id' => 4,
                'name' => 'Customer Service',
                'slug' => 'customer-service',
                'icon' => '<i class="fa-solid fa-user-tie"></i>',
                'url' => 'cs.index',
                'access' => 'super-admin',
                'status' => 'active',
            ],
            [
                'menu_id' => 4,
                'name' => 'Customer',
                'slug' => 'customer',
                'icon' => '<i class="fa-solid fa-user"></i>',
                'url' => 'customer.index',
                'access' => 'super-admin,admin',
                'status' => 'active',
            ],
            [
                'menu_id' => 4,
                'name' => 'Seller',
                'slug' => 'seller',
                'icon' => '<i class="fa-solid fa-building-user"></i>',
                'url' => 'seller.index',
                'access' => 'super-admin,admin',
                'status' => 'active',
            ],
        ];

        foreach ($sub_menus as $sub_menu) {
            SubMenu::insert([
                'uuid' => uuid_create(),
                'menu_id' => $sub_menu['menu_id'],
                'name' => $sub_menu['name'],
                'slug' => $sub_menu['slug'],
                'icon' => $sub_menu['icon'],
                'url' => $sub_menu['url'],
                'access' => $sub_menu['access'],
                'status' => $sub_menu['status'],
                'created_at' => now(),
            ]);
        }
    }
}
