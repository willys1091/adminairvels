<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PeopleButton extends Component{
    pUblic $action,$jumlah,$btn;

    protected $listeners = ['refreshParent'];

    public function mount($action){
       $this->action  = $action='add'?'Create':'save';
    }

    public function refreshParent($jumlah){
        $this->btn = $jumlah > 0 ? true : false ;
        $this->dispatchBrowserEvent('disable-btn',['jumlah'=>$this->btn]);
    }

    public function render(){
        return view('livewire.people-button');
    }    
    
}
