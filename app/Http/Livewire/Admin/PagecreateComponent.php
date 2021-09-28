<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Page;
use App\Models\Menulist;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Carbon\Carbon;

class PagecreateComponent extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $user_id;
    public $page_id;

    public $page_title;
    public $slug;
    public $page_excerpt;
    public $page_content;
    public $feature_image;
    public $newfeature_image;

    //menu list
    public $menu_name;
    public $menu_type;
    public $menu_weight;
    public $parent_id=0;
    public $menu_level;

    public $modelId;

    public function mount()
    {
        $this->parent_id = 0;
        // $this->resetPage();
    }
    public function rules()
    {
        return [
            'page_title' => 'required',
            'slug' => ['required', Rule::unique('pages', 'slug')->ignore($this->modelId)],
            'page_excerpt' => 'required',
            'page_content' => 'required',
            'feature_image' => 'required',

            'menu_name' => 'required',
            'menu_type' => 'required',
            'menu_weight' => 'required',

        ];
    }
    // public function createShowModal()
    // {
    //     $this->resetValidation();
    //     $this->reset();
    //     $this->modalFormVisible = true;
    // }
    public function updatedPagetitle($value)
    {
        $this->slug = Str::slug($value);
    }
    public function modelData()
    {       
        $imagename=Carbon::now()->timestamp.Str::slug($this->page_title).'.'.$this->feature_image->extension();
        $this->feature_image->storeAs('public/pageImg', $imagename);

        return [
            'user_id' => 1,
            'page_title' => $this->page_title,
            'slug' => $this->slug,
            'page_excerpt' => $this->page_excerpt,
            'page_content' => $this->page_content,
            'feature_image' => $imagename,           
        ];
    }
    public function menuModelData()
    {
        if($this->parent_id==0)
            $this->menu_level='1';
        else
            $this->menu_level='2';

        return [
            'user_id' => 1,
            'page_id' => $this->page_id,
            'menu_name' => $this->menu_name,
            'menu_type' => $this->menu_type,
            'parent_id' => $this->parent_id,
            'menu_weight' => $this->menu_weight,
            'menu_level' => $this->menu_level,            
        ];
    }
    public function create()
    {
        $this->validate();

        $page=Page::create($this->modelData());
        $this->page_id = $page->id;
        Menulist::create($this->menuModelData());
        // $this->modalFormVisible = false;
        // $this->reset();
        session()->flash('message', 'Page has been created successfully!');
        return redirect('/admin/page');
    }
    public function updateShowModal($id)
    {
        $this->resetValidation();
        $this->reset();
        $this->modelId = $id;
        $this->modalFormVisible = true;
        $this->loadModel();
    }
    public function loadModel()
    {
        $data = Page::find($this->modelId);
        $this->page_title = $data->page_title;
        $this->slug = $data->slug;
        $this->page_excerpt = $data->page_excerpt;
        $this->page_content = $data->page_content;
        $this->feature_image = $data->feature_image;

        $menu = Menulist::where('page_id', $this->modelId)->first()->update('password', 'john');        
        $this->menu_name = $menu->menu_name;
        $this->menu_type = $menu->menu_type;
        $this->menu_weight = $menu->menu_weight;
        $this->parent_id = $menu->parent_id;
        $this->menu_level = $menu->menu_level;
    }
    public function deleteShowModal($id)
    {
        $this->modelId = $id;
        $this->modalConfirmDeleteVisible = true;
    }
    public function delete()
    {
        Page::destroy($this->modelId);
        $menu=Menulist::where('page_id', $this->modelId)->first();
        Menulist::destroy($menu->id);
        $this->modalConfirmDeleteVisible = false;
        $this->reset();
    }
    public function render()
    {
        return view('livewire.admin.pagecreate-component')->layout('layouts.adminapp');
    }
}
