<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\role;

class PeopleRole extends Component
{
    public $type=[];
    public $name = 'Livewire';
    protected $listeners = ['role'];

    public function role($type){
        //$this->type = role::where('type',$type)->get();
        $this->name = 'Alpine';
        $this->dispatchBrowserEvent('name-changed',['name'=>$this->name]);
    }
    public function render()
    {
        return view('livewire.people-role');
    }

   
}
