<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(5)->create();

        Category::create([
            'name' => 'Backend Developers',
            'slug' => 'backend-developers',
        ]);

        Category::create([
            'name' => 'Frontend Developers',
            'slug' => 'frontend-developers',
        ]);

        Post::factory(25)->create();

    }
}
