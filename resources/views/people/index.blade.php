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
                        <th>Name</th>
                        <th>Email</th>
                        {!! $modul=='admin'?'<th>Title</th>':'' !!}
                        {!! $modul=='user'?'<th>Source</th>':'' !!}
                       
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @php $x=1 @endphp
                    @foreach($people as $p)
                    <tr>
                        <td class="text-center font-size-sm">{{$x}}</td>
                        <td class="d-sm-table-cell font-size-sm">{{$p->email}}</td>
                        <td class="d-sm-table-cell font-size-sm font-w600"><a href="{{url('people/'.$p->id.'/detail')}}">{{ucwords($p->name)}}</a></td>
                        @if($modul=='admin')<td class="d-sm-table-cell font-size-sm">{{$p->title}}</td>@endif
                        @if($modul=='user')<td class="d-sm-table-cell font-size-sm"><span class="badge badge-{{$p->source=='google'?'danger':'primary'}}">{{ucwords($p->source)}}</span> </td> @endif
                       
                        <td class="text-center">
                            <div class="btn-group">
                                @if($modul=='admin') @livewire('people-view', ['status' => $p->active,'modul'=> $modul,'key'=> $p->id]) @endif

                                {{-- <a onClick='showM("{{url('people/'.$u->id.'/edit')}}");return false' type="button" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Edit"><i class="fas fa-fw fa-pencil-alt"></i></a>
                                <a href="{{url('people/'.$u->id.'/detail')}}" type="button" class="btn btn-sm btn-warning" data-toggle="tooltip" title="Manage"><i class="fas fa-tasks"></i></a> --}}
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
s
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
    <script>
        function status(id,active) {
            $.ajax({
                    type: "POST",
                    url: "{{url('people/active')}}",
                    data: {'_token': "{{ csrf_token() }}",'id': id,'active': active},
                    cache: false,
                    success: function(html){
                        $(".table").load(location.href + " .table");
                    }
                });
            $(".table").load(location.href + " .table");
        }
    </script>
@endsection
