<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = [
            ['title' => 'First Post', 'content' => 'This is the first post.'],
            ['title' => 'Second Post', 'content' => 'This is the second post.'],
            ['title' => 'Third Post', 'content' => 'This is the third post.'],
        ];

        foreach ($posts as $post) {
            \App\Models\Post::create($post);
        }
    }
}
