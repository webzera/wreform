<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Carbon\Carbon;

class delPostcreateComponent extends Component
{
	use WithFileUploads;
	use WithPagination;

	public $user_id;
	public $post_id;

	public $title;
	public $slug;
	public $excerpt;
	public $content;
	public $feature_image;
	public $newfeature_image;

	public $modalFormVisible = false;
    public $modalConfirmDeleteVisible = false;
    public $modelId;

    public function mount()
    {
    	// $this->resetPage();
    	$this->user_id = 1;
    	// $this->content = $content;
    }
    public function rules()
    {
        return [
            'title' => 'required',
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($this->modelId)],
            'excerpt' => 'required',
            'content' => 'required',
            'feature_image' => 'required',
        ];
    }
    public function createShowModal()
    {
        $this->resetValidation();
        $this->reset();
        $this->modalFormVisible = true;
    }
    public function updatedTitle($value)
    {
        $this->slug = Str::slug($value);
    }
    // public function updatedContent($value)
    // {
    //     $this->content = $value;
    //     dd($this->content);
    // }
    public function modelData()
    {		
		$imagename=Carbon::now()->timestamp.Str::slug($this->title).'.'.$this->feature_image->extension();
		$this->feature_image->storeAs('public/postImg', $imagename);

        return [
            'user_id' => 1,
            'title' => $this->title,
            'slug' => $this->slug,
            'excerpt' => $this->excerpt,
            'content' => $this->content,
            'feature_image' => $imagename,           
        ];
    }
    public function create()
    {
        // $this->validate();
        Post::create($this->modelData());
        session()->flash('message', 'Post has been created successfully!');
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
        $data = Post::find($this->modelId);
        $this->title = $data->title;
        $this->slug = $data->slug;
        $this->excerpt = $data->excerpt;
        $this->content = $data->content;
        $this->feature_image = $data->feature_image;
    }
    public function update()
    {
        $this->validate();

        Post::find($this->modelId)->update($this->modelDataUpdate());
        $this->modalFormVisible = false;
    }
    public function modelDataUpdate()
    {
		if($this->newfeature_image)
		{
			$imagename=Carbon::now()->timestamp.Str::slug($this->title).'.'.$this->newfeature_image->extension();
		$this->newfeature_image->storeAs('postImg', $imagename);

        return [
            'user_id' => 1,
            'title' => $this->title,
            'slug' => $this->slug,
            'excerpt' => $this->excerpt,
            'content' => $this->content,
            'feature_image' => $imagename,           
        ];
		}

        return [
            'user_id' => 1,
            'title' => $this->title,
            'slug' => $this->slug,
            'excerpt' => $this->excerpt,
            'content' => $this->content,           
        	];
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
        return view('livewire.admin.postcreate-component')->layout('layouts.adminapp');
    }
}
