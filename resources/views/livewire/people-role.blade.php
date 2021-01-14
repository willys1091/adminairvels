<div class="col-lg-6" x-data="{ tipes: @entangle('tipes') }" >
    <div class="form-group" >
        <span @gettype.window="tipes = $event.detail.name" x-model="tipes"></span>
        <label for="Role">Role <span class="merah">*</span></label>
        <select class="js-select2 form-control" name="role" style="width: 100%;" data-placeholder="Choose one..">
            <option></option>
            @foreach($data as $d)
                <option value="{{$d->id}}">{{$d->name}}</option>
            @endforeach
        </select>
    </div>
  
    <script src="{{asset('public/js/plugins/select2/js/select2.full.min.js')}}"></script>
    <script src="{{asset('public/js/siapfulin.core.min.js')}}"></script>
    <script src="{{asset('public/js/siapfulin.app.min.js')}}"></script>
    <script>
        window.livewire.on('change', () => {
            jQuery(function () {
                Siap.helpers([ 'select2']);
            });
        });
    </script>
    <script>
        $(document).ready(function() {
             $('.js-select2').select2({
            }).prepend('<option></option>')
           
    
           
        });
    </script>
</div>