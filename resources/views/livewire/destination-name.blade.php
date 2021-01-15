<div class="col-lg-6">
    <div class="form-group">
        <label for="Name">Name <span class="merah">*</span></label>
        <input wire:model="name" type="text" class="form-control {{ $jumlah > 0 ? 'is-invalid':''}}" name="name" placeholder="Name" required>
        <div class="invalid-feedback">Destination is already exist</div>
    </div>
</div>