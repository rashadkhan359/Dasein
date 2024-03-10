<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'firstname' => 'Dasein',
                'lastname' => 'Admin',
                'username' => 'daseinadmin',
                'email' => 'rashadkhan359@gmail.com',
                'role' => 'admin',
                'status' => 'active',
                'password' => bcrypt('password123'),

            ],
            [
                'firstname' => 'Dasein',
                'lastname' => 'User',
                'username' => 'daseinuser',
                'email' => 'devrashad359@gmail.com',
                'role' => 'user',
                'status' => 'active',
                'password' => bcrypt('password123'),

            ],
            [
                'firstname' => 'Dasein',
                'lastname' => 'Vendor',
                'username' => 'daseinvendor',
                'email' => 'vendor@gmail.com',
                'role' => 'vendor',
                'status' => 'active',
                'password' => bcrypt('password123'),

            ]
        ]);
    }
}
