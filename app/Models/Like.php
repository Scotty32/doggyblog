<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * this model serves as reputation monitoring according to all users of the platform
 */
class Like extends Model
{
    use HasFactory;

    protected $fillable = [
        'likeable_id',
        'likeable_type',
        'author_id',
    ];

    public function likeable(): MorphTo
    {
       return $this->morphTo();
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
