{{-- <div class="col-lg-6">
    <div class="form-group">
        <label for="Role">Role <span class="merah">*</span></label>
        <select class="js-select2 form-control" name="role" style="width: 100%;" data-placeholder="Choose one..">
            <option></option>
            @foreach($role as $r)
                <option value="{{$r->id}}"{{$action=='edit'?$data->roleid==$r->id?'selected':'':''}}>{{$r->name}}</option>
            @endforeach
        </select>
    </div>
</div> --}}
<div>

<div x-data="{name:'{{ $name }}'}">
    
    <span @name-changed.window="name = $event.detail.name" x-text="name"></span>
</div>
</div>