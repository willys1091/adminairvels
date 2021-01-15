<div class="block block-rounded block-themed block-transparent mb-0">
    <div class="block-header bg-primary-dark">
        <h3 class="block-title">{{$title}}</h3>
        <div class="block-options">
            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close"><i class="fa fa-fw fa-times"></i></button>
        </div>
    </div>
    
    <div class="block-content font-size-sm">
        <div class="row">
            <div class="form-group col-sm-4"><b>Days</b></div>
            <div class="form-group col-sm-4"><b>Open</b></div>
            <div class="form-group col-sm-4"><b>Close</b></div>
        </div>
        @php $wh = json_decode($working,true) @endphp
        @foreach($wh as $key=>$w)
            <div class="row">
                <div class="form-group col-sm-4">{{$key}}</div>
                <div class="form-group col-sm-4">{{$w['open']}}</div>
                <div class="form-group col-sm-4">{{$w['close']}}</div>
            </div>
        @endforeach
    </div> 
</div>