<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class postsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){

        $faker = \Faker\Factory::create();
        $imageUrl = 'https://source.unsplash.com/random/300x200?';

        for ($i = 0; $i < 10; $i++) {
            DB::table('posts')->insert([
                'author_id' => rand(1, 10), 
                'title' => $faker->sentence,
                'description' => $faker->paragraph,
                'img_url' => $imageUrl, 
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
