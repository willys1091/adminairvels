<div class="block block-rounded block-themed block-transparent mb-0">
    <div class="block-header bg-primary-dark">
        <h3 class="block-title">{{$title}}</h3>
        <div class="block-options">
            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close"><i class="fa fa-fw fa-times"></i></button>
        </div>
    </div>
    <div class="block-content font-size-sm">
        <div class="row"><div class="col-lg-6"><b> Name</b></div> <div class="col-lg-6"><b>{{$data->name}}</b></div></div>
        <div class="row"><div class="col-lg-6"><b> Country</b></div> <div class="col-lg-6"><b>{{$data->country->name}}</b></div></div> 
        <div class="row"><div class="col-lg-6"><b> State</b></div> <div class="col-lg-6"><b>{{$data->state??"-"}}</b></div></div> 
        <div class="row"><div class="col-lg-6"><b> City</b></div> <div class="col-lg-6"><b>{{$data->city}}</b></div></div> 
        <div class="row"><div class="col-lg-6"><b> Phone</b></div> <div class="col-lg-6"><b>{{$data->phone}}</b></div></div> 
        <div class="row"><div class="col-lg-6"><b> Website</b></div> <div class="col-lg-6"><b>{{$data->website}}</b></div></div> 
        <div class="row"><div class="col-lg-6"><b> Address</b></div> <div class="col-lg-6"><b>{{$data->address}}</b></div></div> 
        <div class="row"><div class="col-lg-6"><b> Currency</b></div> <div class="col-lg-6"><b>{{$data->currency}}</b></div></div> 
        <div class="row"><div class="col-lg-6"><b> Price</b></div> <div class="col-lg-6"><b>{{$data->price}}</b></div></div> 
    </div> 
    <div class="block-content block-content-full text-right border-top">
        <button type="button" class="btn btn-alt-primary mr-1" data-dismiss="modal">Close</button>
    </div>
</div>
