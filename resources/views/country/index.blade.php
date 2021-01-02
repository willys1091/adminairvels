@extends('template')
@section('content')
@inject('GeneralTrait', 'App\Http\Controllers\PeopleController')
<div class="content">
    <div class="block block-rounded">
        <div class="block-content block-content-full"> 
            <table class="table table-bordered table-striped dt-responsive table-vcenter js-dataTable" style="width:100%">
                <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        {!! $modul=='user'?'<th>Avatar</th>':'' !!}
                        <th>Email</th>
                        <th>Name</th>
                        {!! $modul=='admin'?'<th>Title</th><th>type</th>':'' !!}
                        {!! $modul=='user'?'<th>Source</th><th>Refferal</th>':'' !!}
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @php $x=1 @endphp
                    @foreach($people as $p)
                    <tr>
                        <td class="text-center font-size-sm">{{$x}}</td>
                        @if($modul=='user')<td class="d-sm-table-cell font-size-sm"><img src='{{$p->avatar}}' class="rounded-circle" width="100px" height="100px"></td> @endif
                        <td class="d-sm-table-cell font-size-sm">{{$p->email}}</td>
                        <td class="d-sm-table-cell font-size-sm font-w600"><a href="{{url('people/'.$p->id.'/detail')}}">{{ucwords($p->name)}}</a></td>
                        @if($modul=='admin')
                            <td class="d-sm-table-cell font-size-sm">{{$p->title}}</td>
                            <td class="d-sm-table-cell font-size-sm"><span class="badge badge-{{$p->type=='admin'?'danger':'success'}}">{{ucwords($p->type)}}</span></td>
                        @endif
                        @if($modul=='user')<td class="d-sm-table-cell font-size-sm"><span class="badge badge-{{$p->source=='google'?'danger':'primary'}}">{{ucwords($p->source)}}</span> </td> <td class="d-sm-table-cell font-size-sm">{!!$p->refferal<>''?$p->reff->name:'<em class="text-muted font-size-sm">None</em>'!!}</td> @endif
                        <td class="text-center">
                            <div class="btn-group">
                                @if($modul=='admin') @livewire('active', ['status' => $p->active,'modul'=> $modul,'key'=> $p->id]) @endif
                                <a onClick='showM("{{url('people/'.$modul.'/'.$p->id.'/edit')}}");return false' type="button" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Edit"><i class="fas fa-fw fa-pencil-alt"></i></a>
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
