<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DestinationWorkinghours extends Component{
    public $action,$dataworking;
    public $hari = ['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'];

    public function mount($action,$dataworking){
        $this->action = $action;
        $this->dataworking = $dataworking<>'0'?$dataworking:'';
    }

    public function render(){
        return view('livewire.destination-workinghours');
    }
}
