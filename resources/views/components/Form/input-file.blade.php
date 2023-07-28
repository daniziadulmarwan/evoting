@props(['name', 'label'])

<label for="photo" class="text-left">{{ $label }}</label>
<div class="file-upload mb-3">
  <div class="file-select">
    <div class="file-select-button" id="fileName">Choose File</div>
    <div class="file-select-name" id="noFile">No file chosen...</div> 
    <input type="file" name="{{ $name }}" id="chooseFile" class="uploadFile">
  </div>
</div>