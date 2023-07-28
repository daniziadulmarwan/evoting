@props(['title', 'type', 'color' => 'success'])

<div class="form-group text-center">
  <button class="btn btn-{{ $color }} btn-block" type="{{ $type }}">{{ $title }}</button>
</div>