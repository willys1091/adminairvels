<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\destination;

class DestinationName extends Component{
    public $name,$action,$dataname,$jumlah;

    public function mount($action,$dataname){
        $this->action = $action;
        $this->dataname = $dataname<>'0'?$dataname:'';
    }

    public function updated(){
        $this->jumlah=0;
        if($this->name <> $this->dataname){
            $this->jumlah = destination::where('name',$this->name)->count();
        }
    }

    public function render(){
        return view('livewire.destination-name');
    }
}
