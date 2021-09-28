<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\CategoryPost;
use App\Models\Post;

class CatelistComponent extends Component
{
    public $cate_slug;

    public function mount($cate_slug)
    {
        $this->cate_slug = $cate_slug;
    }
    public function read()
    {
       return Post::orderBy('id', 'desc')->paginate(5);
    }
    public function render()
    {
        $cate = Category::where('cate_slug', $this->cate_slug)->first();
        $postids = CategoryPost::select('post_id')->where('category_id', $cate->id)->get()->toArray();
        $data = Post::whereIn('id', $postids)->orderBy('id', 'desc')->paginate(5);
        return view('livewire.catelist-component', [
            'data' => $data,   
            'recentpost' => $this->read(),       
            'catename' => $cate->cate_name,  
        ])->layout('layouts.blogapp');
    }
}
