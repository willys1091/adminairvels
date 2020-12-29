<div class="block block-rounded block-themed block-transparent mb-0">
    <div class="block-header bg-primary-dark">
        <h3 class="block-title">{{$title}}</h3>
        <div class="block-options">
            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                <i class="fa fa-fw fa-times"></i>
            </button>
        </div>
    </div>
    @if($action=='add')
        <form action="{{url('people')}}" method="post" onsubmit="submit.disabled = true; return true;">
    @else
        <form action="{{url('people/'.$user->id)}}" method="post"> @method('patch')
    @endif @csrf
    <input type="hidden" name="modul" value="{{$modul}}"/>
    <div class="block-content font-size-sm">
        <div class="row">
            @livewire('people-email', ['action' => $action , 'dataemail' => $user->email ?? 0])
            @if($modul=='admin')
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="Name">&nbsp;</label>
                        <div class="custom-control custom-checkbox custom-checkbox-square custom-control-lg custom-control-info mb-1">
                            <input type="checkbox" class="custom-control-input admin" id="admin" name="admin" value="1" {{$action=='edit'? $user->type=='admin'?"checked":"":''}}>
                            <label class="custom-control-label font-w600" for="admin">Admin</label>
                        </div>
                    </div>
                </div>
            @elseif($modul =='user')
                @livewire('people-gender', ['action' => $action , 'datagender' => $user->gender ?? 0])
            @endif
        </div>

        <div class="row">
            @if($modul=='admin')
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="Name">Name <span class="merah">*</span></label>
                        <input type="text" class="form-control" name="name" placeholder="Name" value="" required>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="Role">Role <span class="merah">*</span></label>
                        <select class="js-select2 form-control" name="role" style="width: 100%;" data-placeholder="Choose one..">
                            <option></option>
                            @foreach($role as $r)
                                <option value="{{$r->id}}">{{$r->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            @endif
            
            
        </div>
      
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="Name">Title </label>
                        <input type="text" class="form-control" name="title" placeholder="Title" value="" >
                    </div>
                </div>

                

                

                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="Password">Password </label>
                        <input type="password" class="form-control" name="password" placeholder="Password">
                    </div>
                </div>
            </div>
        

       
            @livewire('people-button',['action' => $action])
            {{-- @livewire('test') --}}
        
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
