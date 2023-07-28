<div id="import-voter-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="standard-modalLabel">Upload Data Voter</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      </div>

      <div class="modal-body">
        <form action="{{ route('voter.import') }}" method="post" enctype="multipart/form-data">
          @csrf
          <x-form.input-file name="document" label="Upload File" />
          <x-button type="submit" title="Upload Data" />
        </form>
      </div>
    </div>
  </div>
</div>