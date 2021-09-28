<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Page;
use App\Models\Slider;

class HomeComponent extends Component
{
	public function read()
    {
        return Page::where('id', 1)->first();
    }
    public function slide()
    {
        return Slider::orderBy('id', 'desc')->paginate(5);
    }
    public function render()
    {
        return view('livewire.home-component', [
            'data' => $this->read(),
        	'slider' => $this->slide(),
        ]);
    }
}
