<div id="warning-alert-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm">
      <div class="modal-content">
          <div class="modal-body p-4">
              <div class="text-center">
                  <i class="dripicons-warning h1 text-warning"></i>
                  <h4 class="mt-2">Warning Information</h4>
                  <p class="mt-3">
                    Apakah anda yakin akan menghapus semua data hasil record voting ?
                  </p>
                  <form action="/admin/vote/delete" method="post">
                    @csrf
                    @method('delete')
                    <input type="hidden" name="confirm" value="yes">
                    <button type="submit" class="btn btn-warning my-2">Yes, Continue</button>
                  </form>
              </div>
          </div>
      </div>
  </div>
</div>