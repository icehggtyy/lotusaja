<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Muhammad Ichsan',
            'email' => 'ichsanmuhammed01@gmail.com',
            'password' => 'akulahsangprabu',
        ]);
        category::create([
            'title' => 'Web Development',
            'slug' => 'web-development',
            'color' => 'info',
        ]);
    }
}
