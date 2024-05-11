<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'user_id' => 4,
                'name' => 'Komputer Spek Sederhana',
                'image' => 'picture/komputer.jpg',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi, optio dolorem? In nesciunt nobis maxime, deleniti accusamus totam, aliquam odit placeat atque eius voluptates, culpa asperiores modi repudiandae ipsa! Porro illum, temporibus quo unde ut dignissimos adipisci laudantium repellendus autem minus esse perspiciatis natus assumenda expedita neque atque excepturi fugit! Harum quaerat sunt quae reprehenderit voluptates, aut quibusdam voluptate vitae delectus eius, doloremque hic praesentium ut architecto corrupti, nisi nesciunt omnis possimus quam obcaecati ducimus laboriosam. Nostrum quam temporibus sunt, quaerat quas praesentium consectetur iusto itaque provident minus voluptatem, quidem magnam ipsum nobis totam nulla non repudiandae reprehenderit cum aspernatur?',
                'slug' => 'komputer-spek-sederhana',
                'stock' => 4,
                'weight' => 5,
                'price' => 3000000,
                'status' => 'active',
            ],
            [
                'user_id' => 4,
                'name' => 'Lenovo Ideapad Gaming 3',
                'image' => 'picture/ideapad-gaming.jpg',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi, optio dolorem? In nesciunt nobis maxime, deleniti accusamus totam, aliquam odit placeat atque eius voluptates, culpa asperiores modi repudiandae ipsa! Porro illum, temporibus quo unde ut dignissimos adipisci laudantium repellendus autem minus esse perspiciatis natus assumenda expedita neque atque excepturi fugit! Harum quaerat sunt quae reprehenderit voluptates, aut quibusdam voluptate vitae delectus eius, doloremque hic praesentium ut architecto corrupti, nisi nesciunt omnis possimus quam obcaecati ducimus laboriosam. Nostrum quam temporibus sunt, quaerat quas praesentium consectetur iusto itaque provident minus voluptatem, quidem magnam ipsum nobis totam nulla non repudiandae reprehenderit cum aspernatur?',
                'slug' => 'lenovo-ideapad-gaming-3',
                'stock' => 4,
                'weight' => 5,
                'price' => 14000000,
                'status' => 'active',
            ],
            [
                'user_id' => 4,
                'name' => 'Asus ROG Zephyrus 15',
                'image' => 'picture/asus-rog-zephyrus-15.jpg',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi, optio dolorem? In nesciunt nobis maxime, deleniti accusamus totam, aliquam odit placeat atque eius voluptates, culpa asperiores modi repudiandae ipsa! Porro illum, temporibus quo unde ut dignissimos adipisci laudantium repellendus autem minus esse perspiciatis natus assumenda expedita neque atque excepturi fugit! Harum quaerat sunt quae reprehenderit voluptates, aut quibusdam voluptate vitae delectus eius, doloremque hic praesentium ut architecto corrupti, nisi nesciunt omnis possimus quam obcaecati ducimus laboriosam. Nostrum quam temporibus sunt, quaerat quas praesentium consectetur iusto itaque provident minus voluptatem, quidem magnam ipsum nobis totam nulla non repudiandae reprehenderit cum aspernatur?',
                'slug' => 'asus-rog-zephyrus-15',
                'stock' => 10,
                'weight' => 3,
                'price' => 20000000,
                'status' => 'active',
            ],
            [
                'user_id' => 4,
                'name' => 'Apple Vision Pro',
                'image' => 'picture/apple-vision-pro.jpg',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi, optio dolorem? In nesciunt nobis maxime, deleniti accusamus totam, aliquam odit placeat atque eius voluptates, culpa asperiores modi repudiandae ipsa! Porro illum, temporibus quo unde ut dignissimos adipisci laudantium repellendus autem minus esse perspiciatis natus assumenda expedita neque atque excepturi fugit! Harum quaerat sunt quae reprehenderit voluptates, aut quibusdam voluptate vitae delectus eius, doloremque hic praesentium ut architecto corrupti, nisi nesciunt omnis possimus quam obcaecati ducimus laboriosam. Nostrum quam temporibus sunt, quaerat quas praesentium consectetur iusto itaque provident minus voluptatem, quidem magnam ipsum nobis totam nulla non repudiandae reprehenderit cum aspernatur?',
                'slug' => 'apple-vision-pro',
                'stock' => 3,
                'weight' => 1,
                'price' => 50000000,
                'status' => 'active',
            ],
            [
                'user_id' => 4,
                'name' => 'Acer Nitro 5',
                'image' => 'picture/acer-nitro.jpg',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi, optio dolorem? In nesciunt nobis maxime, deleniti accusamus totam, aliquam odit placeat atque eius voluptates, culpa asperiores modi repudiandae ipsa! Porro illum, temporibus quo unde ut dignissimos adipisci laudantium repellendus autem minus esse perspiciatis natus assumenda expedita neque atque excepturi fugit! Harum quaerat sunt quae reprehenderit voluptates, aut quibusdam voluptate vitae delectus eius, doloremque hic praesentium ut architecto corrupti, nisi nesciunt omnis possimus quam obcaecati ducimus laboriosam. Nostrum quam temporibus sunt, quaerat quas praesentium consectetur iusto itaque provident minus voluptatem, quidem magnam ipsum nobis totam nulla non repudiandae reprehenderit cum aspernatur?',
                'slug' => 'acer-nitro',
                'stock' => 10,
                'weight' => 3,
                'price' => 9000000,
                'status' => 'active',
            ],
            [
                'user_id' => 4,
                'name' => 'Asus TUF Dash 15',
                'image' => 'picture/asus-tuf-dash-15.jpg',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi, optio dolorem? In nesciunt nobis maxime, deleniti accusamus totam, aliquam odit placeat atque eius voluptates, culpa asperiores modi repudiandae ipsa! Porro illum, temporibus quo unde ut dignissimos adipisci laudantium repellendus autem minus esse perspiciatis natus assumenda expedita neque atque excepturi fugit! Harum quaerat sunt quae reprehenderit voluptates, aut quibusdam voluptate vitae delectus eius, doloremque hic praesentium ut architecto corrupti, nisi nesciunt omnis possimus quam obcaecati ducimus laboriosam. Nostrum quam temporibus sunt, quaerat quas praesentium consectetur iusto itaque provident minus voluptatem, quidem magnam ipsum nobis totam nulla non repudiandae reprehenderit cum aspernatur?',
                'slug' => 'asus-tuf-dash-15',
                'stock' => 10,
                'weight' => 3,
                'price' => 11000000,
                'status' => 'active',
            ],
            [
                'user_id' => 4,
                'name' => 'Lenovo Legion Pro',
                'image' => 'picture/lenovo-legion-pro.jpeg',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi, optio dolorem? In nesciunt nobis maxime, deleniti accusamus totam, aliquam odit placeat atque eius voluptates, culpa asperiores modi repudiandae ipsa! Porro illum, temporibus quo unde ut dignissimos adipisci laudantium repellendus autem minus esse perspiciatis natus assumenda expedita neque atque excepturi fugit! Harum quaerat sunt quae reprehenderit voluptates, aut quibusdam voluptate vitae delectus eius, doloremque hic praesentium ut architecto corrupti, nisi nesciunt omnis possimus quam obcaecati ducimus laboriosam. Nostrum quam temporibus sunt, quaerat quas praesentium consectetur iusto itaque provident minus voluptatem, quidem magnam ipsum nobis totam nulla non repudiandae reprehenderit cum aspernatur?',
                'slug' => 'lenovo-legion-pro',
                'stock' => 5,
                'weight' => 4,
                'price' => 25000000,
                'status' => 'active',
            ],
            [
                'user_id' => 4,
                'name' => 'Macbook Pro M1',
                'image' => 'picture/macbook-pro-m1.jpg',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi, optio dolorem? In nesciunt nobis maxime, deleniti accusamus totam, aliquam odit placeat atque eius voluptates, culpa asperiores modi repudiandae ipsa! Porro illum, temporibus quo unde ut dignissimos adipisci laudantium repellendus autem minus esse perspiciatis natus assumenda expedita neque atque excepturi fugit! Harum quaerat sunt quae reprehenderit voluptates, aut quibusdam voluptate vitae delectus eius, doloremque hic praesentium ut architecto corrupti, nisi nesciunt omnis possimus quam obcaecati ducimus laboriosam. Nostrum quam temporibus sunt, quaerat quas praesentium consectetur iusto itaque provident minus voluptatem, quidem magnam ipsum nobis totam nulla non repudiandae reprehenderit cum aspernatur?',
                'slug' => 'macbook-pro-m1',
                'stock' => 15,
                'weight' => 3,
                'price' => 15000000,
                'status' => 'active',
            ],
        ];

        foreach ($products as $product) {
            Product::insert([
                'uuid' => uuid_create(),
                'user_id' => $product['user_id'],
                'name' => $product['name'],
                'image' => $product['image'],
                'description' => $product['description'],
                'slug' => $product['slug'],
                'stock' => $product['stock'],
                'weight' => $product['weight'],
                'price' => $product['price'],
                'created_at' => now(),
            ]);
        }
    }
}
