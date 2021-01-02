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
        </div>

        <div class="row">
            <div class="form-group col-sm-6">
                <label for="Title">Title <span class="merah">*</span></label>
                <input type="text" class="form-control" name="title" placeholder="Title" value="{{$action=='edit'?$data->title:''}}" required>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-sm-6">
                <label for="color">Color <span class="merah">*</span></label>
                <div class="js-colorpicker input-group" data-format="hex">
                    <input type="text" class="form-control" name="color" value="{{$action=='edit'?$data->color:'#5c80d1'}}" required>
                    <div class="input-group-append"><span class="input-group-text colorpicker-input-addon"><i></i></span></div>
                </div>
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
<script>
    jQuery(function () {
        Siap.helpers(['flatpickr', 'select2','colorpicker']);
    });
</script>
