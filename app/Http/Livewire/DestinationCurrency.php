<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\country;

class DestinationCurrency extends Component{
    public $action,$datacurrency,$currency;

    protected $listeners = ['country'];

    public function mount($action,$datacurrency){
        $this->action = $action;
        $this->currency = $datacurrency<>'0'?$datacurrency:'';
    }

    public function country($country){
        $this->currency = country::where('id',$country)->value('currency');
    }

    public function render(){
        return view('livewire.destination-currency');
    }
}
