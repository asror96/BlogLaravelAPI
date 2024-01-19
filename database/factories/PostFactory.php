<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title=fake()->jobTitle();
        return [
            'title' => $title,
            'slug' => Str::slug($title, '_'),
            'text'=>fake()->realTextBetween(500,1000),
            'publish_at'=>now(),
            'created_at'=>now(),
            'updated_at'=>now()
        ];
    }
}
