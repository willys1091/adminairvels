<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PeopleButton extends Component{
    pUblic $action,$data;

    protected $listeners = ['newPost'];

    public function mount($action){
       $this->action  = $action='add'?'Create':'save';
    }

    public function newPost(){
    
        $this->data = 'ss';
    }
    public function render(){
        return view('livewire.people-button');
    }
    
}
