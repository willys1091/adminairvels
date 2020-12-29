<div class="col-lg-6">
    <div class="form-group ">
        <label for="Email">Email <span class="merah">*</span></label>
        <input wire:model="email" type="email" class="form-control {{ $jumlah > 0 ? 'is-invalid':''}}" name="email" placeholder="Email" value="" required >
        <div class="invalid-feedback">Email is already exist</div>
    </div>
</div>