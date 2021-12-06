<?php

namespace Database\Factories;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;
use Storage;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    public function definition()
    {
        $files = Storage::allFiles('thumbnails');
        $randomPic = $files[rand(0, count($files) - 1)];

        $user = DB::table('users')->inRandomOrder()->first();
        $cat = DB::table('categories')->inRandomOrder()->first();

        return [
            'user_id' => $user->id,
            'category_id' => $cat->id,
            'title' => $this->faker->sentence,
            'thumbnail' => $randomPic,
            'slug' => $this->faker->slug,
            'excerpt' => '<p>' . implode('<p></p>', $this->faker->paragraphs(2)) . '</p>',
            'body' => '<p>' . implode('<p></p>', $this->faker->paragraphs(6)) . '</p>',
            'state' => 'pub'
        ];
    }
}
