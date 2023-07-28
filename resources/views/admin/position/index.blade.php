@extends('layouts.app', ['title' => 'Positions'])

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
                      <h4 class="page-title">Candidate</h4>
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
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        
                      <!-- Buttons -->
                      <div class="mb-3">
                        <button class="btn btn-success" data-toggle="modal" data-target="#add-position-modal">
                          <i data-feather="plus"></i> Add New Position
                        </button>
                      </div>

                      <table id="scroll-horizontal-datatable" class="table w-100 nowrap">
                          <thead>
                              <tr>
                                  <th>No</th>
                                  <th>Description</th>
                                  <th>Action</th>
                              </tr>
                          </thead>
                          <tbody>
                            @foreach ($data as $item)
                              <tr>
                                  <td>{{ $loop->iteration }}</td>
                                  <td>{{ $item->description }}</td>
                                  <td>
                                    <button type="button" class="btn btn-warning waves-effect waves-light btn-xs edit-button" data-id="{{ $item->id }}">
                                      <i data-feather="edit-3"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger waves-effect waves-light btn-xs" onclick="deleteData('/admin/position/{{ $item->id }}')">
                                      <i data-feather="trash-2"></i>
                                    </button>
                                  </td>
                              </tr>
                            @endforeach
                          </tbody>
                      </table>
                    </div>
                </div>
            </div>
          </div>
          <!-- Main Content End -->

          <!-- Modals -->
          @include('admin.position.create')
          @include('admin.position.edit')
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