<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Models\Comment;
use Hash;
use Illuminate\Database\Seeder;
use Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(3)->create();
        Category::factory(4)->create();
        Post::factory(40)->create();
        Comment::factory(100)->create();
        $this->call([
            UserSeeder::class
        ]);
        Post::factory(4)->create(['state' => 'draft']);
    }
}
