<?php

namespace App\Services\Post;

use Illuminate\Database\Eloquent\Collection;
use LaravelEasyRepository\BaseService;

interface PostService extends BaseService{
    public function getAllPosts(): Collection;

    public function getBestPosts(int $count = 5): Collection;

    public function likePost(int $id): bool;

    public function dislikePost(int $id): bool;
}
