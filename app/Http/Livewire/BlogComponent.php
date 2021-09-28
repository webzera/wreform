<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;

class BlogComponent extends Component
{
    public function read()
    {
       return Post::orderBy('id', 'desc')->paginate(10);
    }
    public function render()
    {
        return view('livewire.blog-component', [
            'data' => $this->read(),
            'recentpost' => $this->read(),
        ])->layout('layouts.blogapp');
    }
}
