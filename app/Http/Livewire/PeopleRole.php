<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\role;

class PeopleRole extends Component
{
    public $data=[];
    public $tipes='user';

    protected $listeners = ['role'];

    public function mount($action,$datarole){
        $this->data = role::where('type',$this->tipes)->get();
    }

    public function updated(){
        $this->data = role::where('type',$this->tipes)->get();
    }

    public function role($type){
        $this->dispatchBrowserEvent('gettype',['name'=>$type]);
    }

    public function render()
    {
        return view('livewire.people-role');
    }

   
}
