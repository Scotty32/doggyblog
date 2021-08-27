<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function commentable()
    {
        return $this->morphTo();
    }

    
    
    public function rate()
    {
        return $this->morphOne(Image::class, 'rateable');
    }

    /**
     * get author of comment
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
