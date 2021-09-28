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

class PostupdateComponent extends Component
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

    public function mount($id)
    {
        $this->modelId = $id;
        $this->user_id = 1;
        $this->loadModel();
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
    // public function updateShowModal($id)
    // {
    //     $this->resetValidation();
    //     $this->reset();
    //     $this->modelId = $id;        
    //     $this->loadModel();
    // }
    public function loadModel()
    {
        $data = Post::find($this->modelId);
        $this->title = $data->title;
        $this->slug = $data->slug;
        $this->excerpt = $data->excerpt;
        $this->content = $data->content;
        $this->feature_image = $data->feature_image;

        $getCate_id = CategoryPost::where('post_id', $this->modelId)->first();
        $getCate = Category::where('id', $getCate_id->category_id)->first();

        $this->cate_name = $getCate->cate_name;       

        $getTag_ids = TagPost::where('post_id', $this->modelId)->get();
        foreach ($getTag_ids as $key => $getTag_id) {
            $getTag = Tag::where('id', $getTag_id->tag_id)->first();            
            $this->tag_name[$key] = $getTag->tag_name;            
        }                

    }
    public function updatecatemodelData()
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

        $catepost = CategoryPost::where('post_id', $this->modelId)->first();
        $catepost->category_id=$cate_id;
        $catepost->post_id=$this->modelId;        
        $catepost->save();
    }
    public function updatetagmodelData()
    {
        TagPost::where('post_id', $this->modelId)->delete();
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
            $tagpost->post_id=$this->modelId;
            $tagpost->save();
        }
    }
    public function update()
    {
        $this->validate();

        Post::find($this->modelId)->update($this->modelDataUpdate());

        $this->updatecatemodelData();
        $this->updatetagmodelData();

        session()->flash('message', 'Post has been updated successfully!');
        return redirect('/admin/post');
    }
    public function modelDataUpdate()
    {
        if($this->newfeature_image)
        {
            $imagename=Carbon::now()->timestamp.Str::slug($this->title).'.'.$this->newfeature_image->extension();
        $this->newfeature_image->storeAs('public/postImg', $imagename);

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
    public function render()
    {
        return view('livewire.admin.postupdate-component')->layout('layouts.adminapp');
    }
}
