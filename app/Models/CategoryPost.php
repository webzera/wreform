<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryPost extends Model
{
    use HasFactory;

    protected $table = 'category_posts';

    protected $fillable = [
        'category_id',
        'post_id'
    ];

    public function posts(){
      return $this->belongsToMany(Post::class, 'category_posts');
    }
}
