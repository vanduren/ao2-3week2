<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::factory(10)->create();
        Category::factory(10)->create();
        Product::factory(5000)->create();
        User::create([
            'name' => 'admin',
            'email' => 'a@a',
            'password' => bcrypt('password'),
            'email_verified_at' => now(),
        ]);
    }
}
