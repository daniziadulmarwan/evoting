<form wire:submit.prevent="save">
  
    <div class="text-center" wire:ignore>
      <img src="" width="80" class="preview">
    </div>

    <div class="form-group">
        <label for="fullname">Nama Lengkap</label>
        <input wire:model="fullname" class="form-control @error('fullname') is-invalid @enderror" type="text" id="fullname" placeholder="Fullname" name="fullname">
        @error('fullname')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group mb-3">
      <label for="position_id">Position</label>
      <select wire:model="positionId" class="form-control @error('positionId') is-invalid @enderror" id="position_id" name="position_id">
          <option hidden value="">Choose</option>
          @foreach ($positions as $item)
            <option value="{{ $item->id }}">{{ $item->description }}</option>
          @endforeach
      </select>
      @error('positionId')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="form-group mb-3">
      <label for="profile">Profil Singkat</label>
      <textarea wire:model="profile" class="form-control @error('profile') is-invalid @enderror" id="profile" rows="5" name="profile"></textarea>
      @error('profile')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="form-group">
      <label class="form-label" for="photo">Upload Photo</label>
      <input wire:model="photo" type="file" class="form-control-file uploadFile" id="photo" />
    </div>

    <x-button type="submit" title="Add Data" />
</form>