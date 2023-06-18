<?php

namespace App\Models;

use App\Concerns\Commentable;
use App\Concerns\Likeable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory, Likeable, Commentable;

    protected $guarded = ['id'];
    /**
     * relation with user instance
     * inverse calling
     */

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'posted_at'
    ];
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
