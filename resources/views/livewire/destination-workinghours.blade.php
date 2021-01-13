<div>
    @foreach($hari as $d)
        @livewire('destination-workinghours2', ['day' => $d , 'action' => $action , 'dataworking' => $data->working ?? 0],key($d))   
    @endforeach
</div>