<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MessageChat extends Model
{
    use HasFactory;

    /**
     * relation with user instance 
     * inverse calling
     */

     public function user()
     {
        return $this->belongsTo(User::class);
     }

}
