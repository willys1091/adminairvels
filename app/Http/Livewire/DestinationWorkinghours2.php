<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DestinationWorkinghours2 extends Component{

    public $day,$check,$open,$action,$dataworking,$allday,$data,$opentime,$closetime;

    public function mount($day,$action,$dataworking){
        $this->day = $day;
        if($action=='edit'){
           $data = json_decode($dataworking,true);
           if(in_array($day,array_keys($data))){
                $this->check = '1';
                $this->open = "Open";
                $this->opentime = $data[$day]['open'];
                $this->closetime = $data[$day]['close'];
           }else{
                $this->check = '';
                $this->open = "Close";
           }
        }else{
            
            $this->check = '1';
            $this->open = "Open";
        }
    }

    public function updatedCheck(){
        $this->open = !$this->check?'Close':'Open';
    }

    public function updatedAllday(){
        $this->opentime = !$this->allday?'':'00:00';
        $this->closetime = !$this->allday?'':'23.59';
    }

    public function render(){
        return view('livewire.destination-workinghours2');
    }
}
