<?php

namespace Database\Seeders;
use Illuminate\Support\Str;
use App\Models\Comment;
use App\Models\Dog;
use App\Models\Post;
use App\Models\Rate;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Stringable;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->count(10)->hasRoles(1, ['name' => 'moderateur'])->create();
        User::create([
            'name' =>'Enoch BROU',
            'email' => 'brouenoch03@gmail.com',
            'email_verified_at' => now(),
            'admin' => 1,
            'password' => Hash::make('Narutokun2021'), // password
            'remember_token' => Str::random(10)
        ]);
        Rate::factory()->count(1)->for(Post::factory(), 'rateable')->create();
        Rate::factory()->count(1)->for(Post::factory(), 'rateable')->create();
        Rate::factory()->count(1)->for(Post::factory(), 'rateable')->create();
        Rate::factory()->count(1)->for(Post::factory(), 'rateable')->create();
        Rate::factory()->count(1)->for(Post::factory(), 'rateable')->create();
        Rate::factory()->count(1)->for(Post::factory(), 'rateable')->create();
        Rate::factory()->count(1)->for(Post::factory(), 'rateable')->create();
        Rate::factory()->count(1)->for(Post::factory(), 'rateable')->create();
        Rate::factory()->count(1)->for(Post::factory(), 'rateable')->create();
        Rate::factory()->count(1)->for(Post::factory(), 'rateable')->create();
        Rate::factory()->count(1)->for(Post::factory(), 'rateable')->create();
        Rate::factory()->count(1)->for(Post::factory(), 'rateable')->create();
        Rate::factory()->count(1)->for(Post::factory(), 'rateable')->create();
        Rate::factory()->count(1)->for(Comment::factory(), 'rateable')->create();
        Rate::factory()->count(1)->for(Comment::factory(), 'rateable')->create();Rate::factory()->count(1)->for(Comment::factory(), 'rateable')->create();
        Rate::factory()->count(1)->for(Comment::factory(), 'rateable')->create();
        Rate::factory()->count(1)->for(Comment::factory(), 'rateable')->create();
        Dog::factory()->count(5)->create();
    }
}
