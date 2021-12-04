<?php

namespace Database\Factories;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user = DB::table('users')->inRandomOrder()->first();
        $cat = DB::table('categories')->inRandomOrder()->first();

        return [
            'user_id' => $user->id,
            'category_id' => $cat->id,
            'title' => $this->faker->sentence,
            'thumbnail' => $this->faker->imageUrl,
            'slug' => $this->faker->slug,
            'excerpt' => '<p>' . implode('<p></p>', $this->faker->paragraphs(2)) . '</p>',
            'body' => '<p>' . implode('<p></p>', $this->faker->paragraphs(6)) . '</p>',
        ];
    }
}
