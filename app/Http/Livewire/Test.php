<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Test extends Component
{
    public $message='as';



    public function like()
    {
        $this->emit('refreshParent','ds');
    }

    public function render()
    {
        return view('livewire.test');
    }
}
