<div class="block-content block-content-full text-right border-top" x-data="{jml:false}">
    <span @disable-btn.window="jml = $event.detail.jumlah" x-model = "jml"></span>
    <button type="button" class="btn btn-alt-primary mr-1" data-dismiss="modal">Close</button>
    <button type="submit" x-bind:disabled="jml" class="btn btn-primary">{{$action}}</button> 
</div>
