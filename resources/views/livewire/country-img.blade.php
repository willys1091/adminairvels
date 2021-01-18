<div>
    <div class="row">
        <div class="form-group col-sm-6">
            <label>Background</label>
            <div class="custom-file">
                <input wire:model="background" type="file" class="custom-file-input" data-toggle="custom-file-input"  name="userfile" accept='image/*'>
                <label class="custom-file-label" for="userfile">{{$backgroundfilename??'Choose file'}}</label>
                <input type="hidden" name="backgroundfilename" value="{{$backgroundfilename??''}}">
                <input type="hidden" name="backgroundext" value="{{$backgroundext??''}}">
            </div>
        </div>
        <div class="form-group col-sm-6">
            <label>Banner</label>
            <div class="custom-file">
                <input wire:model="banner" type="file" class="custom-file-input" data-toggle="custom-file-input"  name="userfile2" accept='image/*'>
                <label class="custom-file-label" for="userfile2">{{$bannerfilename??'Choose file'}}</label>
                <input type="hidden" name="bannerfilename" value="{{$bannerfilename??''}}">
                <input type="hidden" name="bannerext" value="{{$bannerext??''}}">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="form-group col-sm-6">
            {!! $background ? '<img src="'.$background->temporaryUrl() .'" width="100px">' : ($action == 'edit' ? '<img src="https://doc.airvels.com/img/homepage/'.$backgrounddata.'"width="100px">' : '') !!}
        </div>
        <div class="form-group col-sm-6">
            {!! $banner ? '<img src="'.$banner->temporaryUrl() .'" width="100px">' : ($action == 'edit' ? '<img src="https://doc.airvels.com/img/banner/'.$bannerdata.'"width="100px">' : '') !!}
        </div>
    </div>
</div>