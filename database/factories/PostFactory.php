<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User; 
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition()
    {
        return [
            // 'author_id' => User::factory(),  // This creates a new user for each post. If you want to use existing users, you need to change this.
            'author_id' => $this->fetchRandomUserId(),  // Fetch a random user ID
            'title' => $this->faker->sentence(6, true),
            'description' => $this->faker->text(1000),
            'img_url' => 'https://placeimg.com/640/480/any?' . rand(1, 100),
        ];
    }

    /**
     * Fetch a random user ID from the database or return null if none exist.
     *
     * @return int|null
     */
    protected function fetchRandomUserId()
    {
        $user = User::inRandomOrder()->first(); // Select a random user
        return $user ? $user->id : null; // Return the user ID if available, otherwise null
    }
}


