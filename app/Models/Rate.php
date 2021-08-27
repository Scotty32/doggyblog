<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * this model serves as reputation monitoring according to all users of the platform
 */
class Rate extends Model
{
    use HasFactory;

    public function rateable()
    {
       return $this->morphTo();
    }
}
