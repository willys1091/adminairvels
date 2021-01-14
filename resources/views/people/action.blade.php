<div class="block block-rounded block-themed block-transparent mb-0">
    <div class="block-header bg-primary-dark">
        <h3 class="block-title">{{$title}}</h3>
        <div class="block-options">
            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close"><i class="fa fa-fw fa-times"></i></button>
        </div>
    </div>
    
    @if($action=='add')
        <form action="{{url('people')}}" method="post" onsubmit="submit.disabled = true; return true;">
    @else
        <form action="{{url('people/'.$data->id)}}" method="post"> @method('patch')
        <input type="hidden" name="id" value="{{$data->id}}"/>
    @endif @csrf

    <input type="hidden" name="modul" value="{{$modul}}"/>
    <div class="block-content font-size-sm">
        <div class="row">
            @livewire('people-email', ['action' => $action , 'dataemail' => $data->email ?? 0])
            
            @if($modul=='admin')
                @livewire('people-type', ['action' => $action , 'datatype' => $data->type ?? 0, "id_field" => "people_type"])
            @elseif($modul =='user')
                @livewire('people-gender', ['action' => $action , 'datagender' => $data->gender ?? 0])
            @endif
        </div>

        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="Name">Name <span class="merah">*</span></label>
                    <input type="text" class="form-control" name="name" placeholder="Name" value="{{$action=='edit'?$data->name:''}}" required>
                </div>
            </div>
            @if($modul=='admin')
            @livewire('people-role', ['action' => $action , 'datarole' => $data->roleid ?? 0])
            


            @else
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="Name">Language </label>
                        <input type="text" class="form-control" name="language" placeholder="Language" value="{{$action=='edit'?$data->language:''}}" >
                    </div>
                </div>
            @endif
        </div>
        @if($modul=='admin')
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="Name">Title </label>
                        <input type="text" class="form-control" name="title" placeholder="Title" value="{{$action=='edit'?$data->title:''}}" >
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="Password">Password </label>
                        <input type="password" class="form-control" name="password" placeholder="Password">
                    </div>
                </div>
            </div>   
        @endif

        @livewire('people-button',['action' => $action])
    </div> 
    </form>
</div>
<script src="{{asset('public/js/plugins/select2/js/select2.full.min.js')}}"></script>
<script src="{{asset('public/js/plugins/flatpickr/flatpickr.min.js')}}"></script>
<script>
    Livewire.restart();
   
    jQuery(function () {
        Siap.helpers(['flatpickr', 'select2']);
    });
</script>
