<div class="block block-rounded block-themed block-transparent mb-0">
    <div class="block-header bg-primary-dark">
        <h3 class="block-title">{{$title}}</h3>
        <div class="block-options">
            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close"><i class="fa fa-fw fa-times"></i></button>
        </div>
    </div>
    
    @if($action=='add')
        <form action="{{url('country')}}" method="post" onsubmit="submit.disabled = true; return true;">
    @else
        <form action="{{url('country/'.$data->id)}}" method="post"> @method('patch')
        <input type="hidden" name="id" value="{{$data->id}}"/>
    @endif @csrf

    <div class="block-content font-size-sm">
        <div class="row">
            <div class="form-group col-sm-6">
                <label for="Name">Name <span class="merah">*</span></label>
                <input type="text" class="form-control" name="name" placeholder="Name" value="{{$action=='edit'?$data->name:''}}" required>
            </div>
            <div class="form-group col-sm-6">
                <label for="Name">Currency <span class="merah">*</span></label>
                <input type="text" class="form-control" name="currency" placeholder="Currency" value="{{$action=='edit'?$data->currency:''}}" required>
            </div>
        </div>
       
        @livewire('country-img', ['action' => $action , 'databanner' => $data->img_banner ?? 0 ,  'databackground' => $data->img_background ?? 0])
        
        <div class="row">
            <div class="form-group col-sm-11">
                <label for="Title">Description <span class="merah">*</span></label>
                <textarea class="js-maxlength form-control" name="desc" rows="5" maxlength="1000" placeholder="description about country" data-always-show="false" data-placement="right">{{$action=='edit'?$data->desc_banner:''}}</textarea>
            </div>
        </div>
    </div> 
    <div class="block-content block-content-full text-right border-top">
        <button type="button" class="btn btn-alt-primary mr-1" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">{{$action=='add'?'Create':'save'}}</button> 
    </div>
    </form>
</div>
<script src="{{asset('public/js/plugins/select2/js/select2.full.min.js')}}"></script>
<script src="{{asset('public/js/plugins/flatpickr/flatpickr.min.js')}}"></script>
<script src="{{asset('public/js/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js')}}"></script>
@stack('child-scripts')
<script>
    Livewire.restart();
    jQuery(function () {
        Siap.helpers(['flatpickr', 'select2', 'maxlength']);
    });
</script>
