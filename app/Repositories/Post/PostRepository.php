<?php

namespace App\Repositories\Post;

use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;
use LaravelEasyRepository\Repository;

interface PostRepository extends Repository{
    public function findBests(int $count): Collection;

    public function findAllWithLikes(): Collection;

    public function getWithAllField(int $id): Post;
}
