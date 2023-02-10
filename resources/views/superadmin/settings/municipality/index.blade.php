@extends('superadmin.layouts.app')
@section('title', 'Settings - Municipality')
@prepend('page-css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap5.min.css">
{{-- <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/vendors/datatables.css') }}"> --}}

@endprepend
@section('content')
<div class="page-body">
    <div class="container-fluid">
      <div class="page-title">
        <div class="row">
          <div class="col-sm-6">
            <h3>Settings - Municipality </h3>
          </div>
        </div>
      </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <div class="card">
            <div class="card-body">
                <table class="table" id="municipality-table">
                  <thead>
                    <tr>
                      <th>id</th>
                      <th>Province</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                </table>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
              <div class="card-body">
                  <div class="col">
                      <div class="mb-3">
                        <label class="form-label" for="">Id</label>
                        @if (empty($lastId->id))
                        <input class="form-control d-none" id="idCurrent" type="text" value="1" placeholder="" readonly>
                        @else
                        <input class="form-control d-none" id="idCurrent" type="text" value="{{ $lastId->id + 1 }}" placeholder="" readonly>
                        @endif

                        @if (empty($lastId->id))
                        <input class="form-control" id="id" type="text" value="1" placeholder="" readonly>
                        @else
                        <input class="form-control" id="id" type="text" value="{{ $lastId->id + 1 }}" placeholder="" readonly>
                        @endif
                      </div>
                    </div>
                    <div class="col">
                      <div class="mb-3">
                        <label class="form-label" for="">Municipality Name</label>
                        <input class="form-control" name="municipalityName" id="municipalityName" type="text" placeholder="">
                        <p class="text-danger" id="municipality-name-error-message"></p>
                      </div>
                    </div>
                    <div class="col float-end">
                        <button class="btn btn-danger d-none" id="municipalityCancel">Cancel</button>
                        <button class="btn btn-success d-none" id="municipalityUpdate">Update</button>
                      <button class="btn btn-primary" id="municipalityCreate">Create</button>
                    </div>
                </div>
              </div>
            </div>
      </div>
    </div>
    <!-- Container-fluid Ends-->
  </div>
@push('page-scripts')
{{-- <script src="{{ asset('/assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/assets/js/datatable/datatables/datatable.custom.js') }}"></script> --}}
<script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js"></script>
<script>
    $(function () {
        var table = $('#municipality-table').DataTable({
            processing: true,
            serverSide: true,
            order: [[0, 'desc']],
            ajax: "{{ route('municipality.list.settings.superadmin') }}",
            columns: [
                {data: 'id', name: 'id'},
                {data: 'description', name: 'description'},
                {data: 'action', name: 'action'}
            ]
        });



    });
    $(document).on("click", "#btnEdit", function(e) {
        let data = e.target.value;
        datas = JSON.parse(data);
        $("#id").val(datas.id);
        $("#municipalityName").val(datas.description);
        $("#municipalityCancel").removeClass('d-none');
        $("#municipalityUpdate").removeClass('d-none');
        $("#municipalityCreate").addClass('d-none');

    });


  $(document).on("click", "#municipalityCreate", function() {
    let municipalityName = $('#municipalityName').val();
    let id = $('#id').val();
    $.ajax({
          url: `/superadmin/municipality/settings/store`,
          type: "POST",
          data: {
            municipalityName : municipalityName,
            _token: '{{ csrf_token() }}'
            },
            success: function(result) {
                if (result.success == true) {
                      $('#municipality-table').DataTable().ajax.reload();
                      $('#id').val(parseInt(id) + 1);
                      $('#municipalityName').val('');
                      swal("Successfully Added", "", "success");
                }
          },
          error: function (result) {
            if (result.status === 422) {
                let errors = result.responseJSON.errors;
                if (errors.hasOwnProperty("municipalityName")) {
                        $("#municipalityName").addClass("is-invalid");
                        $("#municipality-name-error-message").html("");
                        $("#municipality-name-error-message").append(
                            `<span>${errors.municipalityName[0]}</span>`
                        );
                    } else {
                        $("#municipalityName").removeClass("is-invalid");
                        $("#municipality-name-error-message").html("");
                    }
            }
          }
    });
  });

  $(document).on("click", "#municipalityCancel", function() {
    let idCurrent = $('#idCurrent').val();
    $('#id').val(parseInt(idCurrent));
    $('#municipalityName').val('');
    $("#municipalityCancel").addClass('d-none');
    $("#municipalityUpdate").addClass('d-none');
    $("#municipalityCreate").removeClass('d-none');
  });

  $(document).on("click", "#municipalityUpdate", function() {
    let municipalityName = $('#municipalityName').val();
    let id = $('#id').val();

    if(municipalityName == ''){
        $("#municipalityName").addClass("is-invalid");
        $("#municipality-name-error-message").html("");
        $("#municipality-name-error-message").append(
            `<span>The municipality name field is required.</span>`
        );
    }else{
        $("#municipalityName").removeClass("is-invalid");
        $("#municipality-name-error-message").html("");
        $.ajax({
          url: `/superadmin/municipality/settings/update/${id}`,
          type: "post",
          data: {
            municipalityName : municipalityName,
            _token: '{{ csrf_token() }}'
            },
            success: function(result) {
                if (result.success == true) {
                      $('#municipality-table').DataTable().ajax.reload();
                      let idCurrent = $('#idCurrent').val();
                      $('#id').val(parseInt(idCurrent));
                      $('#municipalityName').val('');
                      $("#municipalityCancel").addClass('d-none');
                      $("#municipalityUpdate").addClass('d-none');
                      $("#municipalityCreate").removeClass('d-none');
                      swal("Successfully Updated!", "", "success");
                }
          }
    });
    }

  });


  $(document).on("click", ".btnDelete", function(e) {
      let id = e.target.value;
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this Data!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                    $.ajax({
                        url: `/superadmin/municipality/settings/destroy/${id}`,
                        type: "delete",
                        data: {
                            _token: '{{ csrf_token() }}'
                            },
                            success: function(result) {
                                if (result.success == true) {
                                    $('#municipality-table').DataTable().ajax.reload();
                                    swal("Successfully Deleted!", "", "success");
                                }
                        }
                    });
            } else {
                swal("Your Data is safe!");
            }
        });
  });


</script>
@endpush
@endsection

