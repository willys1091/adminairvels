<div>
    @foreach($hari as $d)
        @livewire('destination-workinghours2', ['day' => $d , 'action' => $action , 'dataworking' => $dataworking ?? 0],key($d))   
    @endforeach

    
</div>