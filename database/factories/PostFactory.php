<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        $title = fake()->sentence(4);
        $image = fake()->randomElement(['image1.jpg', 'image2.jpg', 'image3.jpg']);

        return [
            'title' => $title,
            'slug' => str($title)->slug(),
            'content' => fake()->paragraphs(3, true),
            'image' => $image,
            'tags' => [fake()->word(), fake()->word(), fake()->word()],
            'published' => fake()->boolean(),
            'published_at' => fake()->dateTimeThisMonth(),
        ];
    }
}
