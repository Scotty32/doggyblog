<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Rate;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->hasRoles(1, ['name' => 'moderateur'])->create();
        Rate::factory()->count(1)->for(Post::factory(), 'rateable')->create();
        Post::factory()->count(10)->create();
        Rate::factory()->count(1)->for(Post::factory(), 'rateable')->create();
        Comment::factory()->count(5)->for(Post::factory(), 'commentable')->create();
        Rate::factory()->count(1)->for(Comment::factory(), 'rateable')->create();
    }
}
