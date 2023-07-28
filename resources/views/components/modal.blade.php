@props(['id', 'title'])

<div id="{{ $id }}" class="modal fade" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="standard-modalLabel">{{ $title }}</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      </div>

      {{ $slot }}
      
    </div>
  </div>
</div>