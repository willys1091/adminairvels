<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\country;

class DestinationCountry extends Component{
    public $data=[];
    public $country;

    public function mount($action,$datacountry){
        $this->data = country::where('active','1')->get();
    }

    public function updated(){
        $this->emit("country",$this->country);
    }

    public function render(){
        return view('livewire.destination-country');
    }
}
