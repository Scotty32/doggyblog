<?php

namespace App\Concerns;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Relations\morphMany;

trait Commentable
{
    /**
     * Get all of the resource's likes.
     */
    public function comments(): morphMany
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    /**
     * Create a like if it does not exist yet.
     */
    public function comment(string $content): void
    {
        $this->comments()->create(['author_id' => auth()->id(), 'content' => $content]);
    }

    //$this->comments()->ofMany('likes', 'max')
}
