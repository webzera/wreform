<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
use App\Models\User;

class CategoryComponent extends Component
{
	public $modalFormVisible;	
	public $postId;

    public $category_name='';
    public $selctCateId;

    public function getCategoriesProperty()
    {
        if($this->category_name != '')
        {
            return Category::where('cate_name', 'like', '%'.$this->category_name.'%')->get();
        }else
        {
            return [];
        }
    }

	public function mount()
	{
		// $this->postId=$postId;
	}
	public function cRead()    {
    	
        return Category::where('status', 'Yes')->get();
    }
    public function render()
    {
        return view('livewire.admin.category-component', [
        	'cdata' => $this->cRead(),
        ])->layout('layouts.adminapp');
    }
}
