<form wire:submit.prevent="update">

  <div class="form-group text-center">
    @if ($oldPhoto)
      <img src="/storage/{{ $oldPhoto }}" width="80" id="preview-photo">
    @endif
  </div>

  <div class="form-group">
    <label for="fullname">Nama Lengkap</label>
    <input wire:model="fullname" class="form-control @error('fullname') is-invalid @enderror" type="text" id="fullname" placeholder="Fullname" name="fullname">
    @error('fullname')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>

  <div class="form-group">
      <label for="username">Username</label>
      <input wire:model="username" class="form-control @error('username') is-invalid @enderror" type="text" id="username" placeholder="Username" name="username">
      @error('username')
          <div class="invalid-feedback">{{ $message }}</div>
      @enderror
  </div>

  <div class="form-group">
    <label for="password">Password</label>
    <div class="input-group input-group-merge">
        <input wire:model="password_text" type="password" id="password" class="form-control @error('password_text') is-invalid @enderror" placeholder="******" name="password">
        <div class="input-group-append" data-password="false">
            <div class="input-group-text">
                <span class="password-eye"></span>
            </div>
        </div>
        @error('password_text')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
  </div>

  <div class="form-group">
    <label class="form-label" for="photo">Upload Photo</label>
    <input wire:model="newPhoto" type="file" class="form-control-file uploadFile" id="photo" />
  </div>

  <x-button type="submit" title="Update Data" />

</form>
