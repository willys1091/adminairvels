<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PeopleGender extends Component{
    public $check,$gender,$action,$datagender;

    public function mount($action,$datagender){
        $this->action = $action;
        $this->datagender = $datagender;
        $this->check = $action=='edit'?$datagender=='Female'?'1':'':'';
        $this->gender = $action=='edit'?$datagender:"Male";
    }

    public function updated(){
        $this->gender = !$this->check?'Male':'Female';
    }
    
    public function render(){
        return view('livewire.people-gender');
    }
}
