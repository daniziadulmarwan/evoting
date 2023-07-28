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
          <input wire:model="password" type="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="******" name="password">
          <div class="input-group-append" data-password="false">
              <div class="input-group-text">
                  <span class="password-eye"></span>
              </div>
          </div>
          @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
      </div>
    </div>

    <div class="form-group">
        <label class="form-label" for="photo">Upload Photo</label>
        <input wire:model="photo" type="file" class="form-control-file uploadFile" id="photo" />
    </div>

    <x-button type="submit" title="Add Data" />

</form>