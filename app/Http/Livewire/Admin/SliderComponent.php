<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Slider;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Carbon\Carbon;


class SliderComponent extends Component
{
	use WithFileUploads;
	use WithPagination;

	public $title;
	public $caption;
	public $sub_caption;
	public $slider_image;
	public $newslider_image;
	public $link_url;

	public $modalFormVisible = false;
    public $modalConfirmDeleteVisible = false;
    public $modelId;

    public function mount()
    {
    	// $this->reset();	
    }
    public function rules()
    {
        return [
            'title' => 'required',
            'caption' => 'required',
            'sub_caption' => 'required',
            'slider_image' => 'required',
            'link_url' => 'required|url',
        ];
    }
    public function createShowModal()
    {
        $this->resetValidation();
        $this->reset();
        $this->modalFormVisible = true;
    }
    public function modelData()
    {		
		$imagename=Carbon::now()->timestamp.Str::slug($this->title).'.'.$this->slider_image->extension();
		$this->slider_image->storeAs('public/sliderImg', $imagename);

        return [
            'title' => $this->title,
            'caption' => $this->caption,
            'sub_caption' => $this->sub_caption,
            'slider_image' => $imagename,
            'link_url' => $this->link_url,
        ];
    }
    public function create()
    {
        $this->validate();

        Slider::create($this->modelData());
        $this->modalFormVisible = false;
        $this->reset();

        session()->flash('message', 'Slider has been created successfully!');
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
        $data = Slider::find($this->modelId);
        $this->title = $data->title;
        $this->caption = $data->caption;
        $this->sub_caption = $data->sub_caption;
        $this->slider_image = $data->slider_image;
        $this->link_url = $data->link_url;
    }
    public function update()
    {
        $this->validate();

        Slider::find($this->modelId)->update($this->modelDataUpdate());
        $this->modalFormVisible = false;
    }
    public function modelDataUpdate()
    {
		if($this->newslider_image)
		{
			$imagename=Carbon::now()->timestamp.Str::slug($this->title).'.'.$this->newslider_image->extension();
			$this->newslider_image->storeAs('public/sliderImg', $imagename);
			
			return [
            'title' => $this->title,
            'caption' => $this->caption,
            'sub_caption' => $this->sub_caption,
            'slider_image' => $imagename,
            'link_url' => $this->link_url,
        	];
		}

        return [
            'title' => $this->title,
            'caption' => $this->caption,
            'sub_caption' => $this->sub_caption,
            'link_url' => $this->link_url,           
        	];
    }
    public function deleteShowModal($id)
    {
        $this->modelId = $id;
        $this->modalConfirmDeleteVisible = true;
    }
    public function delete()
    {
        Slider::destroy($this->modelId);
        $this->modalConfirmDeleteVisible = false;
        $this->reset();
    }
	public function read()
    {
        return Slider::orderBy('id', 'desc')->paginate(5);
    }
    public function render()
    {
        return view('livewire.admin.slider-component', [
            'data' => $this->read(),
        ])->layout('layouts.adminapp');
    }
}