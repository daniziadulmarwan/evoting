<div id="add-position-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="standard-modalLabel">Add New Position</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      </div>

      <div class="modal-body">
        <form action="{{ route('position.store') }}" method="post">
          @csrf
          <div class="form-group">
              <label for="description">Description</label>
              <input class="form-control @error('description') is-invalid @enderror" type="text" id="description" placeholder="Deskripsi" name="description">
          </div>
          
          <x-button type="submit" title="Add Data" />
        </form>
      </div>
    </div>
  </div>
</div>