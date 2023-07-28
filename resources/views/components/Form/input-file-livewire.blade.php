@props(['model', 'label'])

<div class="form-group" wire:ignore>
  <label for="photo" class="text-left">{{ $label }}</label>
  <div class="file-upload mb-3">
  <div class="file-select">
      <div class="file-select-button" id="fileName">Choose File</div>
      <div class="file-select-name" id="noFile">No file chosen...</div> 
      <input wire:model="{{ $model }}" type="file" id="chooseFile" class="uploadFile">
  </div>
  </div>
</div>