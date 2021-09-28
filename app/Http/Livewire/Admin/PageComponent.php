<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Page;

class PageComponent extends Component
{
    public $modelId;
    public $modalConfirmDeleteVisible = false;
    
	public function read()
    {
        return Page::orderBy('id', 'desc')->paginate(10);
    }
    public function deleteShowModal($id)
    {
        $this->modelId = $id;
        $this->modalConfirmDeleteVisible = true;
    }
    public function delete()
    {
        Page::destroy($this->modelId);
        $this->modalConfirmDeleteVisible = false;
        $this->reset();
    }
    public function render()
    {
        return view('livewire.admin.page-component', [
        	'data' => $this->read(),
        ])->layout('layouts.adminapp');
    }
}
