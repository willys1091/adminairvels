@extends('template')
@section('content')
<div class="content">
    <div class="block block-rounded">
        <div class="block-content block-content-full">
            @if($action=='add')
                <form action="{{url('destination')}}" method="post" onsubmit="submit.disabled = true; return true;" name="roleform">
            @else
                <form action="{{url('destination/'.$data->id)}}" method="post" name="roleform"> @method('patch')
            @endif @csrf
                <div class="row">   
                    @livewire('destination-name', ['action' => $action , 'dataname' => $data->name ?? 0])
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="Company">Country <span class="merah">*</span></label>
                            <select class="js-select2 form-control" name="company" style="width: 100%;"data-placeholder="Choose one..">
                                <option></option>
                                @foreach($country as $c)
                                    <option value="{{$c->id}}">{{$c->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="Name">State </label>
                            <input type="text" class="form-control" name="name" placeholder="Name" value="{{$action=='edit'?$data->name:''}}" required>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="Name">City </label>
                            <input type="text" class="form-control" name="name" placeholder="Name" value="{{$action=='edit'?$data->name:''}}" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="Name">Phone </label>
                            <input type="text" class="form-control" name="name" placeholder="Name" value="{{$action=='edit'?$data->name:''}}" required>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="Name">Website </label>
                            <input type="text" class="form-control" name="name" placeholder="Name" value="{{$action=='edit'?$data->name:''}}" required>
                        </div>
                    </div>
                </div>
               
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="Name">Currency </label>
                            <input type="text" class="form-control" name="name" placeholder="Name" value="{{$action=='edit'?$data->name:''}}" required>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="Name">Price </label>
                            <input type="text" class="form-control" name="name" placeholder="Name" value="{{$action=='edit'?$data->name:''}}" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-5">
                        <div class="form-group">
                            <label for="Name">Working Hours</label><br>
                        </div>
                    </div>
                   
                   
                   
                   
                </div>
                @livewire('destination-workinghours', ['action' => $action , 'dataworking' => $data->working ?? 0])
                
                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> {{$action=='add' ? 'Create' : 'Save'}}</button>
        
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section ('headerScript')
    @livewireStyles
    <link rel="stylesheet" id="css-main" href="{{asset('public/js/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" id="css-main" href="{{asset('public/js/plugins/flatpickr/flatpickr.min.css')}}">
@endsection

@section ('footerScript')
    @livewireScripts
    <script src="{{asset('public/js/plugins/select2/js/select2.full.min.js')}}"></script>
    <script src="{{asset('public/js/siapfulin.js')}}"></script>
    <script src="{{asset('public/js/plugins/flatpickr/flatpickr.min.js')}}"></script>
    <script>
        Livewire.restart();
        jQuery(function () {
            Siap.helpers([ 'flatpickr','select2']);
        });
    </script>
@endsection
