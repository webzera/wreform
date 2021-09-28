<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'excerpt',
        'content',
        'feature_image'
    ];

    protected $dispatchesEvents = [
        'created' => \App\Events\PostCreateEvent::class
        // 'updated' => \App\Events\PostCreateEvent::class
    ];
}
