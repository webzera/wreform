<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Post;
use App\Models\Category;
use App\Models\CategoryPost;
use App\Models\Tag;
use App\Models\TagPost;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Carbon\Carbon;

class PostcreateComponent extends Component
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

    public $cate_name;
    public $tag_name;
    public $insertingpost_id;

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

            'cate_name' => 'required',
            'tag_name' => 'required',
        ];
    }

    public function updatedTitle($value)
    {
        $this->slug = Str::slug($value);
    }
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
    public function addcatemodelData()
    {
        $chkcate=Category::where('cate_name', $this->cate_name)->first();

        if($chkcate){
            $cate_id = $chkcate->id;
        }else{
            $catenew= new Category;
            $catenew->cate_name=$this->cate_name;
            $catenew->cate_slug=Str::slug($this->cate_name);
            $catenew->save();

            $cate_id = $catenew->id;
        }

        $catepost = new CategoryPost;
        $catepost->category_id=$cate_id;
        $catepost->post_id=$this->insertingpost_id;
        $catepost->save();
    }
    public function addtagmodelData()
    {
        foreach($this->tag_name as $tagitem){
            $chktag=Tag::where('tag_name', $tagitem)->first();

            if($chktag){
                $tag_id = $chktag->id;
            }else{
                $tagnew= new Tag;
                $tagnew->tag_name=$tagitem;
                $tagnew->tag_slug=Str::slug($tagitem);
                $tagnew->save();

                $tag_id = $tagnew->id;
            }

            $tagpost = new TagPost;
            $tagpost->tag_id=$tag_id;
            $tagpost->post_id=$this->insertingpost_id;
            $tagpost->save();
        }
    }
    public function create()
    {        
        $this->validate();
        $post_add=Post::create($this->modelData());

        $this->insertingpost_id=$post_add->id;

        $this->addcatemodelData();
        $this->addtagmodelData();

        session()->flash('message', 'Post has been created successfully!');
        return redirect('/admin/post');
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
