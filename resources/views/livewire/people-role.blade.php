<div class="col-lg-6" x-data="{ tipes: @entangle('tipes') }" >
    <div class="form-group" >
        <span @gettype.window="tipes = $event.detail.name" x-model="tipes"></span>
        <label for="Role">Role <span class="merah">*</span></label>
     
        <select class="js-select2 form-control" name="role" style="width: 100%;" data-placeholder="Choose one..">
            <option></option>
            @foreach($data as $d)
                <option value="{{$d->id}}" {{$datarole==$d->id?"selected":""}}>{{$d->name}}</option>
            @endforeach
        </select>
    </div>

    @push('scripts')
    <script>
        document.addEventListener("livewire:load", function(event) {
            Livewire.hook('message.processed', (message, component) => {
                $('.js-select2').select2()
            }); 
        });
    </script>
@endpush
</div>