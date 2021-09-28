<?php

namespace App\Http\Livewire;

use App\Models\Page;

use Livewire\Component;

class PagesComponent extends Component
{
    public $slug;

    public function mount($slug)
    {
        $this->slug = $slug;
    }   

    public function render()
    {
        $page = Page::where('slug', $this->slug)->first();
        return view('livewire.pages-component', ['page' => $page]);
    }
}
