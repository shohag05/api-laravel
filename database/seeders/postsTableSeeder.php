<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;

class postsTableSeeder extends Seeder
{
    public function run()
    {
        Post::factory()->count(50)->create();  // Create 50 posts
    }
}
