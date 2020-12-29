<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\admin;

class PeopleEmail extends Component{
    public $email,$action,$dataemail,$jumlah;

    public function mount($action,$dataemail=null){
        $this->action = $action;
    }

    public function updated(){
        $this->jumlah = admin::where('email',$this->email)->count();
        $this->emit('newPost', '1');
    }
   
    public function render(){
        return view('livewire.people-email');
    }
}
