<div class="col-lg-4">
    <div class="form-group" wire:ignore>
        <label for="Company">Country <span class="merah">*</span></label>
        <select wire:model="country" class="js-select2 form-control" name="country" style="width: 100%;"data-placeholder="Choose one..">
            <option></option>
            @foreach($data as $d)
                <option value="{{$d->id}}" {{$d->id=$country?"selected":""}}>{{$d->name}}</option>
            @endforeach
        </select>
    </div>
    <script src="{{asset('public/js/siapfulin.core.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('.js-select2').on('change', function (e) {
                @this.set('country', e.target.value);
            });
        });
    </script>
</div>