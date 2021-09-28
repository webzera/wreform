<?php

namespace App\Http\Livewire;


use Livewire\Component;
use Illuminate\Validation\Rule;

use App\Models\Subscribe;
use App\Models\Opinion;
use App\Models\User;

use App\Notifications\OpinionNotification;

class SubscribeComponent extends Component
{
    public $name ='';
    public $email;
    public $opinion;
    public $country_name;

    public $opinionFormDisplay = '';
    public $formSubmitDisplay = 'hidden';

    public function rules()
    {
        return [
            'email' => 'required|email',
            'opinion' => 'required|min:10|max:500',            
        ];
    }
    public function modelData()
    {       
        if(!$this->name){ $this->name='Guest'; }
        if(!$this->country_name){ $this->country_name='Unavailable'; }
        return [
            'name' => $this->name,
            'email' => $this->email,
        ];
    }
    public function addOpinion()
    {
        if(!$this->validate())
        {
            $this->opinionFormDisplay = '';
        }
        Subscribe::create($this->modelData());
        $this->opinionFormDisplay = 'hidden';
        $this->formSubmitDisplay = '';

        //store subscribe end

        //send notificatin for opinion

        $opinion=New Opinion;

        $opinion->name=$this->name;
        $opinion->email=$this->email;
        $opinion->opinion=$this->opinion;
        $opinion->country_name=$this->country_name;

        User::find(1)->notify(new OpinionNotification($opinion));

        // Notification::send($users, new OpinionNotification());

    }
    public function render()
    {
        return view('livewire.subscribe-component');
    }
}
