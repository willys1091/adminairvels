@extends('template')
@section('content')
{{-- @inject('GeneralTrait', 'App\Http\Controllers\PeopleController') --}}
<div class="content">
    <div class="block block-rounded">
        <div class="block-content block-content-full">
            <table class="table table-bordered table-striped dt-responsive table-vcenter js-dataTable" style="width:100%">
                <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th>Name</th>
                        <th>Type</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @php $x=1 @endphp
                    @foreach($role as $r)
                    <tr>
                        <td class="text-center font-size-sm">{{$x}}</td>
                        <td class="d-sm-table-cell font-size-sm">{{$r->name}}</td>
                        <td class="d-sm-table-cell font-size-sm"><span class="badge badge-{{$r->type=='admin'?'danger':'success'}}">{{ucwords($r->type)}}</span></td>
                        
                        <td class="text-center">
                            <div class="btn-group">
                                <a href="{{url('role/'.$r->id.'/edit')}}" type="button" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Edit"><i class="fas fa-fw fa-pencil-alt"></i></a>
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
