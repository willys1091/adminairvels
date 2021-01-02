@extends('template')
@section('content')
<div class="content">
    <div class="block block-rounded">
        <div class="block-content block-content-full"> 
            <table class="table table-bordered table-striped dt-responsive table-vcenter js-dataTable" style="width:100%">
                <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th>Name</th>
                        <th>Title</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @php $x=1 @endphp
                    @foreach($category as $c)
                    <tr>
                        <td class="text-center font-size-sm">{{$x}}</td>
                        <td class="d-sm-table-cell font-size-lg "><span class='badge' style='background-color:#FFF;color:{{$c->color}};border:1px solid {{$c->color}}'>{{$c->name}}<span></td>
                        <td class="d-sm-table-cell font-size-sm">{{$c->title}}</td>
                        <td class="text-center">
                            <a onClick='showM("{{url('category/'.$c->id.'/edit')}}");return false' type="button" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Edit"><i class="fas fa-fw fa-pencil-alt"></i></a>
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
    <link rel="stylesheet" id="css-main" href="{{asset('public/js/plugins/datatables/dataTables.bootstrap4.css')}}">
    <link rel="stylesheet" id="css-main" href="{{asset('public/js/plugins/datatables/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" id="css-main" href="{{asset('public/js/plugins/datatables/buttons-bs4/buttons.bootstrap4.min.css')}}">
    <link rel="stylesheet" id="css-main" href="{{asset('public/js/plugins/flatpickr/flatpickr.min.css')}}">
    <link rel="stylesheet" id="css-main" href="{{asset('public/js/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')}}">
@endsection

@section ('footerScript')
    <script src="{{asset('public/js/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('public/js/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('public/js/plugins/datatables/buttons/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('public/js/plugins/datatables/buttons/buttons.print.min.js')}}"></script>
    <script src="{{asset('public/js/plugins/datatables/buttons/buttons.html5.min.js')}}"></script>
    <script src="{{asset('public/js/plugins/datatables/buttons/buttons.flash.min.js')}}"></script>
    <script src="{{asset('public/js/plugins/datatables/buttons/buttons.colVis.min.js')}}"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.6/js/responsive.bootstrap4.min.js"></script>
    <script src="{{asset('public/js/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>
    <script src="{{asset('public/js/siapfulin.js')}}"></script>
@endsection
