@extends('layouts.app', ['title' => 'Setting'])

@push('style')
  <!-- Datatables CSS -->
  <link href="/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
  <link href="/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
  <link href="/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
  <link href="/assets/libs/datatables.net-select-bs4/css//select.bootstrap4.min.css" rel="stylesheet" type="text/css" />
 
  <style>
    .table > tbody > tr > td {
     vertical-align: middle;
    }
  </style>
@endpush

@section('content')
  <div class="content">
      <!-- Start Content-->
      <div class="container-fluid">
          <!-- start page title -->
          <div class="row">
              <div class="col-12">
                  <div class="page-title-box">
                      <h4 class="page-title">Setting</h4>
                  </div>
              </div>
          </div>     
          <!-- end page title --> 

          <!-- Alert -->
          <div class="row">
            <div class="col-md-12">
              @if (session()->has('msg'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                  <i class="mdi mdi-check-all mr-2"></i> {{ session('msg') }}
                </div>
              @endif
            </div>
          </div>

          <!-- Main Content Start -->
          <div class="row">
            <div class="col-md-12">
              <div class="card-box">
                  <ul class="nav nav-pills navtab-bg nav-justified">
                      <li class="nav-item">
                          <a href="#election" data-toggle="tab" aria-expanded="false" class="nav-link active">
                              Election Setting
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="#changepassword" data-toggle="tab" aria-expanded="true" class="nav-link">
                              Change Password
                          </a>
                      </li>
                  </ul>

                  <div class="tab-content">
                      <div class="tab-pane show active" id="election">
                        <form action="/admin/setting/{{ $data->id }}" method="post">
                          @csrf
                          @method('put')
                          <div class="form-group">
                            <label for="title">Title</label>
                            <input value="{{ old('title', $data->title) }}" class="form-control @error('title') is-invalid @enderror" type="text" id="title" placeholder="Write here to change title" name="title">
                          </div>

                          <div class="form-group">
                            <label for="max_vote">Max Vote</label>
                            <input value="{{ old('max_vote', $data->max_vote) }}" class="form-control @error('max_vote') is-invalid @enderror" type="number" id="max_vote" placeholder="Write here to change max vote" name="max_vote">
                          </div>

                          <x-button type="submit" title="Change" />
                        </form>
                      </div>

                      <div class="tab-pane" id="changepassword">
                        @livewire('setting.change-password')
                      </div>
                  </div>
              </div>
            </div>
          </div>
          <!-- Main Content End -->
      </div>
  </div>
@endsection

@push('script')
   <!-- Datatables Library -->
   <script src="/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
   <script src="/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
   <script src="/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
   <script src="/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
   <script src="/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
   <script src="/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
   <script src="/assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
   <script src="/assets/libs/datatables.net-buttons/js/buttons.flash.min.js"></script>
   <script src="/assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
   <script src="/assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
   <script src="/assets/libs/datatables.net-select/js/dataTables.select.min.js"></script>
   <script src="/assets/libs/pdfmake/build/pdfmake.min.js"></script>
   <script src="/assets/libs/pdfmake/build/vfs_fonts.js"></script>

   <!-- Datatables Init -->
   <script src="/assets/js/pages/datatables.init.js"></script>

   <!-- Sweet Alert -->
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

   <!-- Helpers -->
   <script src="/assets/custom/helpers.js"></script>

   <script>
      $('.table').on('click', '.edit-button', function() {
        $('#edit-position-modal').modal('show')
        const id = $(this).data('id');
        Livewire.emit('edit-position', id);
        console.log(id)
      });
   </script>
@endpush