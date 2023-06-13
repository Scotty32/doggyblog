<?php

namespace App\Repositories\Post;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;

class PostRepositoryImplement extends Eloquent implements PostRepository{

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected $model;

    public function __construct(Post $model)
    {
        $this->model = $model;
    }

    public function findBests(int $count): Collection
    {
        return Post::withCount('likes')
            ->orderByDesc('likes_count')
            ->limit($count)
            ->get();
    }

    public function findAllWithLikes(): Collection
    {
        return Post::withCount('likes')
            ->with(['author', 'likes'])
            ->get()
            ->map(function ($post) {
                $post->is_liked = $post->isLiked();
                return $post;
            });
    }

    public function getWithAllField(int $id): Post
    {
        return Post::with([
                'author',
                'thumbnail',
            ])
            ->find($id);
    }
}
