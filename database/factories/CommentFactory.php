<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user = DB::table('users')->inRandomOrder()->first();
        $post = DB::table('posts')->inRandomOrder()->first();

        return [
            'post_id' => $post->id,
            'user_id' => $user->id,
            'body' => $this->faker->paragraph
        ];
    }
}
