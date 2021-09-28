<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
  protected $table = 'tags';

    protected $fillable = [
        'tag_name',
        'tag_slug'
    ];

    public function posts(){
      return $this->belongsToMany(Post::class, 'tag_post');
    }

}