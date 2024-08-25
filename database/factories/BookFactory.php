<?php

namespace Database\Factories;

use App\Models\Author;
use App\Models\Category;
use App\Models\Publisher;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $bookName = fake()->name;
        return [
            'name' => fake()->name,
            'slug' => Str::slug($bookName, "-"),
            'cover_image' => 'upload/book/cover-image/default-cover-image.jpg',
            'description' => fake()->sentence(),
            'price' => fake()->numberBetween(10000, 20000),
            'price_sale' => fake()->numberBetween(5000, 9000),
            'stock' => fake()->numberBetween(1, 50),
            'author_id' => Author::all()->random()->id,
            'publisher_id' => Publisher::all()->random()->id,
            'category_id' => Category::all()->random()->id,
        ];
    }
}
