<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Tag;
use App\Models\TagPost;
use App\Models\Post;

class TaglistComponent extends Component
{
    public $tag_slug;

    public function mount($tag_slug)
    {
        $this->tag_slug = $tag_slug;
    }
    public function read()
    {
       return Post::orderBy('id', 'desc')->paginate(5);
    }
    public function render()
    {
        $tag = Tag::where('tag_slug', $this->tag_slug)->first();
        $tadids = TagPost::select('post_id')->where('tag_id', $tag->id)->get()->toArray();
        $data = Post::whereIn('id', $tadids)->orderBy('id', 'desc')->paginate(5);
        return view('livewire.taglist-component', [
            'data' => $data,   
            'recentpost' => $this->read(),       
            'tagname' => $tag->tag_name,  
        ])->layout('layouts.blogapp');
    }
    
}
