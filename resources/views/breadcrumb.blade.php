<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-sm-fill h3 my-2">
                @php $temp = explode('|',$title ?? "|") @endphp
                {{$temp[0]}}
                <small class="d-block d-sm-inline-block mt-2 mt-sm-0 font-size-base font-w400 text-muted">
                    {{$subtitle ?? ""}}
                </small>
            </h1>
            @if (isset($contentHeader) && $contentHeader != "")
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    @if($contentHeader=='btn')
                        <a href="{{ url($btn['url']) }}" class="btn btn-primary btn-sm float-sm-right"
                            title="{{$btn['title']}}"><i class="{{$btn['icon']}}"></i></a>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    @elseif($contentHeader=='mdl')
                        <button type="button" onClick='showM("{{url($btn['url'])}}");return false'
                            class="btn btn-primary btn-sm float-sm-right" data-toggle="modal" title="{{$btn['title']}}"><i
                                class="{{$btn['icon']}}"></i></button>
                    @elseif($contentHeader=='bc')
                        <ol class="breadcrumb breadcrumb-alt">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            @foreach($bc as $bc)
                            <li class="breadcrumb-item {{$bc['active']=='1'?'active':''}}">
                                {!!$bc['active']=='1'?$bc['title']:'<a href="'.url($bc['url']).'">'.$bc['title'].'</a>'!!}</li>
                            @endforeach
                        </ol>
                    @endif
                </nav>
            @endif
        </div>
    </div>
</div>
