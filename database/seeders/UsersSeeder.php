<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Super Admin',
                'email' => 'super_admin@gmail.com',
                'phone' => '00000010',
                'password' => 'superadmin123',
                'status' => 'active',
                'type' => 'super-admin',
            ],
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'phone' => '00000011',
                'password' => 'admin123',
                'status' => 'active',
                'type' => 'admin',
            ],
            [
                'name' => 'Ahmad Fadilah',
                'email' => 'ahmadfadilah202003@gmail.com',
                'phone' => '6285156071334',
                'password' => 'ahmad123',
                'status' => 'active',
                'type' => 'customer',
            ],
            [
                'name' => 'Seller Ahmad',
                'email' => 'fdhlh202003@gmail.com',
                'phone' => '6285795069461',
                'password' => 'seller123',
                'status' => 'active',
                'type' => 'seller',
            ]
        ];
        foreach ($users as $user) {
            User::insert([
                'uuid' => uuid_create(),
                'name' => $user['name'],
                'email' => $user['email'],
                'phone' => $user['phone'],
                'password' => Hash::make($user['password']),
                'status' => $user['status'],
                'type' => $user['type'],
                'created_at' => now()
            ]);
        }
    }
}
