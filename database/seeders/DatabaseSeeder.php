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
        User::create([
            'name' => 'Tama',
            'username' => 'tamagxtchi',
            'email'=> 'tamagx@gmail.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);

        User::factory(5)->create();

        Category::create([
            'name' => 'Backend Developers',
            'slug' => 'backend-developers',
        ]);

        Category::create([
            'name' => 'Frontend Developers',
            'slug' => 'frontend-developers',
        ]);

        Category::create([
            'name' => 'Cyber Security',
            'slug' => 'cyber-security',
        ]);

        Category::create([
            'name' => 'Blockchain Technology',
            'slug' => 'blockchain-technology',
        ]);

        Category::create([
            'name' => 'Mobile Apps Developers',
            'slug' => 'mobile-apps-developers',
        ]);

        Post::factory(40)->create();

    }
}
