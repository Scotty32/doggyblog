<?php

namespace Database\Seeders\Dev;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Database\Seeder;

class DevDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::factory()
            ->count(20)
            ->create()
            ->each(function ($post) {
                Comment::factory()
                    ->count(5)
                    ->create([
                        'commentable_id' => $post->id
                    ]);
            });
    }
}
