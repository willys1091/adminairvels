@extends('template')
@section('content')
<div class="content">
    <div class="block block-rounded">
        <div class="block-content block-content-full">
            <table class="table table-bordered table-striped dt-responsive table-vcenter js-dataTable" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        {!!$modul=='system'?'<th>IP Address</th><th>Description</th>':''!!}
                        {!!$modul=='email'?'<th>To</th><th>Subject</th>':''!!}
                        <th>Timestamp</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($log as $l)
                        <tr>
                            <td>{{$l->id}}</td>
                            <td>{{$l->name}}</td>
                            <td>{{$l->email}}</td>
                            {!!$modul=='system'?'<td>'.$l->ipaddress.'</td><td>'.$l->description.'</td>':''!!}
                            {!!$modul=='email'?'<td>'.$l->to.'</td><td>'.$l->subject.'</td>':''!!}
                            <td>{{$l->timestamp}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
