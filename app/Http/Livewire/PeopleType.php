<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PeopleType extends Component{
    public $check,$type,$action,$datatype;
    public $test;

    public function mount($action,$datatype){
        
        $this->action = $action;
        $this->datatype = $datatype;
        $this->check = $action=='edit'?($datatype=='admin'?'1':''):'';
    }

    public function updated(){
        $this->emit("role",$this->check=='1'?'admin':'user');
    }

    public function render(){
        return view('livewire.people-type');
    }
}
