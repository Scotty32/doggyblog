<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $guarded = '';
    /*
    ** Polymorphique Relation instance
     */
    public function imageable()
    {
        return $this->morphTo();
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    } 
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function rate()
    {
        return $this->morphOne(Image::class, 'rateable');
    }


}
