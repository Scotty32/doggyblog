<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MessageAdmin extends Model
{
    use HasFactory;

    /**
     * relation with user instance
     */

     public function user()
     {
        return $this->belongsTo(User::class);
     }
}
