<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name'  => 'Malik',
            'username' => 'malik',
            'email' => 'malik@gmail.com',
            'password' => bcrypt('password')
        ]);
        Post::factory(20)->create();
        User::factory(5)->create();
    }
}
