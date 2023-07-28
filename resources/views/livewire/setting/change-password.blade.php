<form wire:submit.prevent="save">
  <div class="form-group">
    <label for="new_password">New Password</label>
    <div class="input-group input-group-merge">
        <input wire:model="password" type="password" id="new_password" class="form-control @error('password') is-invalid @enderror" placeholder="******" name="new_password">
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
    <label for="confirm_new_password">Repeat New Password</label>
    <div class="input-group input-group-merge">
        <input wire:model="confirm_password" type="password" id="confirm_new_password" class="form-control @error('confirm_password') is-invalid @enderror" placeholder="******" name="confirm_new_password">
        <div class="input-group-append" data-password="false">
            <div class="input-group-text">
                <span class="password-eye"></span>
            </div>
        </div>
        @error('confirm_password')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
  </div>

  <x-button type="submit" title="Change Password" />
</form>