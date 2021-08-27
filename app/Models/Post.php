<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    /**
     * relation with user instance
     * inverse calling
     */

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * polymorphique relation with image model
     */

     public function images()
     {
        return $this->morphMany(Image::class, 'imageable');
     }

     
    /**
     * polymorphique relation with comment model
     */

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
    /**
     * more liked comments ralation instance
     */
    public function bestComment()
{
    return $this->morphOne(Image::class, 'imageable')->ofMany('likes', 'max');
}
    public function rate()
    {
        return $this->morphOne(Rate::class, 'rateable');
    }
}
