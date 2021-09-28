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

class PageupdateComponent extends Component
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

    public function mount($id)
    {
        $this->parent_id = 0;
        $this->modelId = $id;
        $this->loadModel();
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
    public function updatedPagetitle($value)
    {
        $this->slug = Str::slug($value);
    }

    public function loadModel()
    {
        $data = Page::find($this->modelId);
        $this->page_title = $data->page_title;
        $this->slug = $data->slug;
        $this->page_excerpt = $data->page_excerpt;
        $this->page_content = $data->page_content;
        $this->feature_image = $data->feature_image;

        $menu = Menulist::where('page_id', $this->modelId)->first();        
        $this->menu_name = $menu->menu_name;
        $this->menu_type = $menu->menu_type;
        $this->menu_weight = $menu->menu_weight;
        $this->parent_id = $menu->parent_id;
        $this->menu_level = $menu->menu_level;
    }
    public function update()
    {
        $this->validate();

        Page::find($this->modelId)->update($this->modelDataUpdate());
        Menulist::where('page_id', $this->modelId)->update($this->menuModelDataUpdate());
        session()->flash('message', 'Page has been updated successfully!');
        return redirect('/admin/page');
    }
    public function modelDataUpdate()
    {
        if($this->newfeature_image)
        {
            $imagename=Carbon::now()->timestamp.Str::slug($this->page_title).'.'.$this->newfeature_image->extension();
        $this->newfeature_image->storeAs('public/pageImg', $imagename);

            return [
                'user_id' => 1,
                'page_title' => $this->page_title,
                'slug' => $this->slug,
                'page_excerpt' => $this->page_excerpt,
                'page_content' => $this->page_content,
                'feature_image' => $imagename,           
            ];
        }

        return [
            'user_id' => 1,
            'page_title' => $this->page_title,
            'slug' => $this->slug,
            'page_excerpt' => $this->page_excerpt,
            'page_content' => $this->page_content,           
            ];
    }
    public function menuModelDataUpdate()
    {
        if($this->parent_id==0)
            $this->menu_level='1';
        else
            $this->menu_level='2';
        
        return [
            'user_id' => 1,
            'page_id' => $this->modelId,
            'menu_name' => $this->menu_name,
            'menu_type' => $this->menu_type,
            'parent_id' => $this->parent_id,
            'menu_weight' => $this->menu_weight,
            'menu_level' => $this->menu_level,           
        ];
    }
    public function render()
    {
        return view('livewire.admin.pageupdate-component')->layout('layouts.adminapp');
    }
}
