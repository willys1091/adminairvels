<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\admin;

class PeopleEmail extends Component{
    public $email,$action,$dataemail,$jumlah;

    public function mount($action,$dataemail){
        $this->action = $action;
        $this->dataemail = $dataemail<>'0'?$dataemail:'';
        $this->email = $dataemail<>'0'?$dataemail:'';
    }

    public function updated(){
        $this->jumlah=0;
        if($this->email <> $this->dataemail){
            $this->jumlah = admin::where('email',$this->email)->count();
        }
        $this->emit('refreshParent',$this->jumlah);
    }
    
    public function render(){
        return view('livewire.people-email');
    }
}
