<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Post;

class PostComponent extends Component
{
    public $modelId;
    public $modalConfirmDeleteVisible = false;

    public function read()
    {
        return Post::orderBy('id', 'desc')->paginate(10);
    }
    public function deleteShowModal($id)
    {
        $this->modelId = $id;
        $this->modalConfirmDeleteVisible = true;
    }
    public function delete()
    {
        Post::destroy($this->modelId);
        $this->modalConfirmDeleteVisible = false;
        $this->reset();
    }
    public function render()
    {
        return view('livewire.admin.post-component', [
        	'data' => $this->read(),
        ])->layout('layouts.adminapp');
    }
}
