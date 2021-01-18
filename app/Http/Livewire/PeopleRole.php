<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\role;

class PeopleRole extends Component{
    public $data=[];
    public $tipes,$datarole;

    protected $listeners = ['role'];

    public function mount($action,$datarole,$datatype){
        $this->datarole = $datarole<>0?$datarole:"";
        $this->tipes = $action=="add"?"user":$datatype;
        $this->updated();
    }

    public function updated(){
        $this->data = role::where('type',$this->tipes)->get();
    }

    public function role($type){
        $this->dispatchBrowserEvent('gettype',['name'=>$type]);
    }

    public function render(){
        return view('livewire.people-role');
    }
}
