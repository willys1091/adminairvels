<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DestinationWorkinghours2 extends Component{

    public $day,$check,$open,$action,$dataworking,$allday,$time;

    public function mount($day,$action,$dataworking){
        $this->day = $day;
        $this->check = '1';
        $this->time = "0";
        $this->open = "Open";
    }

    public function updatedCheck(){
        $this->open = !$this->check?'Close':'Open';
    }

    public function updatedAllday(){
        $this->time = !$this->allday?'0':'1';
    }

    public function render(){
        return view('livewire.destination-workinghours2');
    }
}
