<div class="row">
    <div class="col-lg-2">
        <div class="form-group"><label for="Name">{{$day}}</label></div>
    </div>

    <div class="col-lg-2">
        <div class="custom-control custom-switch custom-control-lg mb-2">
            <input wire:model="check" type="checkbox"class="custom-control-input" id="open{{$day}}" name="{{$day}}" value="1">
            <label class="custom-control-label" for="open{{$day}}"><b>{{$open}}</b></label>
        </div>
    </div>
    
    @if($check)
        @if($action =='add')
            <div class="col-lg-2">
                <div class="custom-control custom-checkbox custom-checkbox-square custom-control-lg custom-control-info mb-1">
                    <input wire:model="allday" type="checkbox" class="custom-control-input admin" id="allday{{$day}}" name="admin" value="1">
                    <label class="custom-control-label font-w600" for="allday{{$day}}">24 Hours</label>
                </div>
            </div>
        @endif
        <div class="col-lg-3">
            <div class="form-group">
                <input type="text" class="js-flatpickr form-control bg-white"  name="open{{$day}}" data-enable-time="true" data-no-calendar="true" data-date-format="H:i" data-time_24hr="true" value="{{$time=='1'?'00:00':''}}" placeholder="Open">
            </div>
        </div>
        <div class="col-lg-3">
            <div class="form-group">
                <input type="text" class="js-flatpickr form-control bg-white"  name="close{{$day}}" data-enable-time="true" data-no-calendar="true" data-date-format="H:i" data-time_24hr="true" value="{{$time=='1'?'23:59':''}}" placeholder="Close">
            </div>
        </div>
    @endif
    <script src="{{asset('public/js/plugins/flatpickr/flatpickr.min.js')}}"></script>
    <script src="{{asset('public/js/siapfulin.core.min.js')}}"></script>
    <script src="{{asset('public/js/siapfulin.app.min.js')}}"></script>
    <script>
        jQuery(function () {
            Siap.helpers([ 'flatpickr','select2']);
        });
    </script>
</div>