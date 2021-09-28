<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Opinion;

class OpinionComponent extends Component
{
    public $modalConfirmDeleteVisible = false;
    public $modelId;

    public function deleteShowModal($id)
    {
        $this->modelId = $id;
        $this->modalConfirmDeleteVisible = true;
    }
    public function delete()
    {
        // Opinion::destroy($this->modelId);
        // Opinion::where('id', $this->modelId)->delete();
        $adminn=\App\Models\User::find(1);
        $adminn->notifications()->find(['id' => $this->modelId])->first()->delete();
        $this->modalConfirmDeleteVisible = false;
        $this->reset();
    }
    // public function read()
    // {
    //     $adminn=\App\Models\User::find(1);
    //     return $adminn->notifications();
    // }
    public function render()
    {
        return view('livewire.admin.opinion-component')->layout('layouts.adminapp');
    }
}
