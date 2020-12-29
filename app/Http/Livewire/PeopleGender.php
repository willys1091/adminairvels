<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PeopleGender extends Component{
    public $check,$gender,$action,$datagender;

    public function mount($action,$datagender){
        $this->action = $action;
        $this->gender = "Male";
    }

    public function updated(){
        if(!$this->check){
            $this->gender='Male';
        }else{
            $this->gender='Female';
        }
    }
    
    public function render(){
        return view('livewire.people-gender');
    }
}
