<div class="col-lg-6 comp">
    <div class="form-group">
        <label>Gender </label>
        <div class="custom-control custom-switch custom-control-lg mb-2">
            <input type="checkbox" wire:model="check" class="custom-control-input " id="gender" name="gender" value="{{$gender}}">
            <label class="custom-control-label lblstatus" for="gender"><b>{{$gender}}</B></label>
        </div>
    </div>
</div>