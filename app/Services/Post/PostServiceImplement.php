<?php

namespace App\Services\Post;

use LaravelEasyRepository\Service;
use App\Repositories\Post\PostRepository;
use Illuminate\Database\Eloquent\Collection;

class PostServiceImplement extends Service implements PostService{

     /**
     * don't change $this->mainRepository variable name
     * because used in extends service class
     */
     protected $mainRepository;

    public function __construct(PostRepository $mainRepository)
    {
      $this->mainRepository = $mainRepository;
    }

    public function getAllPosts(): Collection
    {
        return $this->mainRepository->All();
    }
    public function getBestPosts(int $count = 5): Collection
    {
        return $this->mainRepository->findBests($count);
    }

    public function likePost(int $id): bool
    {
        $post = $this->mainRepository->find($id);
        return $post->like();
    }
    public function dislikePost(int $id): bool
    {
        $post = $this->mainRepository->find($id);
        return $post->dislike();
    }
}
