<div class="modal-body">
  <form wire:submit.prevent="update">
    <div class="form-group">
        <label for="description">Description</label>
        <input wire:model="description" class="form-control @error('description') is-invalid @enderror" type="text" id="description" placeholder="Deskripsi" name="description">
    </div>
    <x-button type="submit" title="Update Data" />
  </form>
</div>
