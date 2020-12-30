<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PeopleButton extends Component{
    pUblic $action,$prompt;

    protected $listeners = ['refreshParent'];

    // public function mount($action){
    //    $this->action  = $action='add'?'Create':'save';
    // }

  
    public function render(){
        return view('livewire.people-button');
    }

    public function refreshParent(){
        session()->flash('message','sass');
     }
    
}
