<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;

class SingleblogComponent extends Component
{
    public $slug;

    public function mount($slug)
    {
        $this->slug = $slug;
    }
    public function read()
    {
       return Post::orderBy('id', 'desc')->paginate(5);
    }
    public function render()
    {
        $post = Post::where('slug', $this->slug)->first();
        return view('livewire.singleblog-component', [
            'post' => $post,
            'recentpost' => $this->read(),            
        ])->layout('layouts.singleblogapp');
    }
}
