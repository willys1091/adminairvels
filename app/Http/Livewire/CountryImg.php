<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class CountryImg extends Component{
    use WithFileUploads;
    public $action,$bannerdata,$backgrounddata,$banner,$background,$bannerfilename,$bannerext,$backgroundfilename,$backgroundext;

    public function mount($action,$databanner,$databackground){
        $this->action = $action;
        $this->bannerdata= $databanner;
        $this->backgrounddata = $databackground;
    }

    public function updatedBackground(){
        storage::disk('public2')->putFileAs('assets/media/background/', $this->background , $this->background->getClientOriginalName());
        $this->backgroundfilename = $this->background->getClientOriginalName();
        $this->backgroundext = $this->background->extension();
    }
    
    public function updatedBanner(){
        Storage::disk('public2')->putFileAs('assets/media/banner/', $this->banner , $this->banner->getClientOriginalName());
        $this->bannerfilename = $this->banner->getClientOriginalName();
        $this->bannerext = $this->banner->extension();
    }

    public function render(){
        return view('livewire.country-img');
    }
}
