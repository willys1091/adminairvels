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
                    @livewire('destination-country', ['action' => $action , 'datacountry' => $data->country_id ?? 0])
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="Name">State </label>
                            <input type="text" class="form-control" name="state" placeholder="State" value="{{$action=='edit'?$data->state:''}}">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="Name">City </label>
                            <input type="text" class="form-control" name="city" placeholder="City" value="{{$action=='edit'?$data->city:''}}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="Name">Phone </label>
                            <input type="text" class="form-control numonly" name="phone" placeholder="Phone" value="{{$action=='edit'?$data->phone:''}}" maxlength="13" required>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="Name">Website </label>
                            <input type="text" class="form-control" name="website" placeholder="Website" value="{{$action=='edit'?$data->website:''}}" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="Name">maps </label>
                            <input type="text" class="form-control" name="maps" placeholder="Maps" value="{{$action=='edit'?$data->map:''}}" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-sm-11">
                        <label for="Title">Address <span class="merah">*</span></label>
                        <textarea class="js-maxlength form-control" name="address" rows="2" maxlength="1000" placeholder="Address" data-placement="right" data-always-show="true">{{$action=='edit'?$data->address:''}}</textarea>
                    </div>
                </div>

                <div class="row">
                    @livewire('destination-currency', ['action' => $action , 'datacurrency' => $data->currency ?? 0])
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="Name">Price </label>
                            <input type="text" class="form-control numonly" name="price" placeholder="Price" value="{{$action=='edit'?$data->price:''}}" required>
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
                @livewire('destination-workinghours', ['action' => $action , 'dataworking' => $data->work_hour2 ?? 0])
                
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
    <script src="{{asset('public/js/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js')}}"></script>
    <script>
        jQuery(function () {
            Siap.helpers([ 'flatpickr', 'maxlength']);
        });
    </script>
@endsection
