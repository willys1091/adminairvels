@extends('template')
@section('content')
@inject('General', 'App\Http\Controllers\DestinationController')
<div class="content">
    <div class="block block-rounded">
        <div class="block-content block-content-full"> 
            <table class="table table-bordered table-striped dt-responsive table-vcenter js-dataTable" style="width:100%">
                <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th>Name</th>
                        <th>Country</th>
                        <th>Phone</th>
                        <th>Website</th>
                        <th>Address</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @php $x=1 @endphp
                    @foreach($destination as $d)
                    <tr>
                        <td class="text-center font-size-sm">{{$x}}</td>
                        <td class="text-center font-size-sm">{{ucwords($General->readmore($d->name,25))}}</td>
                        <td class="text-center font-size-sm">{{$d->country->name}}</td>
                        <td class="text-center font-size-sm" style="width: 15%;">{{$d->phone??'<em class="text-muted font-size-sm">None</em>'}}</td>
                        <td class="text-center font-size-sm" {!!$d->website==''? '':'data-toggle="popover" data-animation="true" data-placement="bottom" data-content="'.$d->website.'" '!!}>{!!$d->website==''?'<em class="text-muted font-size-sm">None</em>':'<a href="'.$d->website.'"><i>[Link Website]</i></a>'!!}</td>
                        <td class="text-center font-size-sm">{{ucwords($General->readmore($d->address,25))}}</td>
                        <td class="text-center">
                            <div class="btn-group">
                                <a href="{{url('destination/'.$d->id.'/show')}}" type="button" class="btn btn-sm btn-warning" data-toggle="tooltip" title="Detail"><i class="fas fa-fw fa-list"></i></a>
                                <a href="{{url('destination/'.$d->id.'/edit')}}" type="button" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Edit"><i class="fas fa-fw fa-pencil-alt"></i></a>
                            </div>
                        </td> 
                    </tr> 
                    @php $x++ @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section ('headerScript')
    @livewireStyles
    <link rel="stylesheet" id="css-main" href="{{asset('public/js/plugins/datatables/dataTables.bootstrap4.css')}}">
    <link rel="stylesheet" id="css-main" href="{{asset('public/js/plugins/datatables/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" id="css-main" href="{{asset('public/js/plugins/datatables/buttons-bs4/buttons.bootstrap4.min.css')}}">
    <link rel="stylesheet" id="css-main" href="{{asset('public/js/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" id="css-main" href="{{asset('public/js/plugins/flatpickr/flatpickr.min.css')}}">
@endsection

@section ('footerScript')
    @livewireScripts
    <script>Livewire.restart();</script>
    <script src="{{asset('public/js/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('public/js/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('public/js/plugins/datatables/buttons/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('public/js/plugins/datatables/buttons/buttons.print.min.js')}}"></script>
    <script src="{{asset('public/js/plugins/datatables/buttons/buttons.html5.min.js')}}"></script>
    <script src="{{asset('public/js/plugins/datatables/buttons/buttons.flash.min.js')}}"></script>
    <script src="{{asset('public/js/plugins/datatables/buttons/buttons.colVis.min.js')}}"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.6/js/responsive.bootstrap4.min.js"></script>
    <script src="{{asset('public/js/siapfulin.js')}}"></script>
@endsection
