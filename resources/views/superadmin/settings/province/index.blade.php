@extends('superadmin.layouts.app')
@section('title', 'Settings - Province')
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
            <h3>Settings - Province </h3>
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
                <table class="table" id="province-table">
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
                        <label class="form-label" for="">Province Name</label>
                        <input class="form-control" name="provinceName" id="provinceName" type="text" placeholder="">
                        <p class="text-danger" id="province-name-error-message"></p>
                      </div>
                    </div>
                    <div class="col float-end">
                        <button class="btn btn-danger d-none" id="provinceCancel">Cancel</button>
                        <button class="btn btn-success d-none" id="provinceUpdate">Update</button>
                      <button class="btn btn-primary" id="provinceCreate">Create</button>
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
        var table = $('#province-table').DataTable({
            processing: true,
            serverSide: true,
            order: [[0, 'desc']],
            ajax: "{{ route('province.list.settings.superadmin') }}",
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
        $("#provinceName").val(datas.description);
        $("#provinceCancel").removeClass('d-none');
        $("#provinceUpdate").removeClass('d-none');
        $("#provinceCreate").addClass('d-none');

    });


  $(document).on("click", "#provinceCreate", function() {
    let provinceName = $('#provinceName').val();
    let id = $('#id').val();
    $.ajax({
          url: `/superadmin/province/settings/store`,
          type: "POST",
          data: {
            provinceName : provinceName,
            _token: '{{ csrf_token() }}'
            },
            success: function(result) {
                if (result.success == true) {
                      $('#province-table').DataTable().ajax.reload();
                      $('#id').val(parseInt(id) + 1);
                      $('#provinceName').val('');
                      swal("Successfully Added", "", "success");
                }
          },
          error: function (result) {
            if (result.status === 422) {
                let errors = result.responseJSON.errors;
                if (errors.hasOwnProperty("provinceName")) {
                        $("#provinceName").addClass("is-invalid");
                        $("#province-name-error-message").html("");
                        $("#province-name-error-message").append(
                            `<span>${errors.provinceName[0]}</span>`
                        );
                    } else {
                        $("#provinceName").removeClass("is-invalid");
                        $("#province-name-error-message").html("");
                    }
            }
          }
    });
  });

  $(document).on("click", "#provinceCancel", function() {
    let idCurrent = $('#idCurrent').val();
    $('#id').val(parseInt(idCurrent));
    $('#provinceName').val('');
    $("#provinceCancel").addClass('d-none');
    $("#provinceUpdate").addClass('d-none');
    $("#provinceCreate").removeClass('d-none');
  });

  $(document).on("click", "#provinceUpdate", function() {
    let provinceName = $('#provinceName').val();
    let id = $('#id').val();

    if(provinceName == ''){
        $("#provinceName").addClass("is-invalid");
        $("#province-name-error-message").html("");
        $("#province-name-error-message").append(
            `<span>The province name field is required.</span>`
        );
    }else{
        $("#provinceName").removeClass("is-invalid");
        $("#province-name-error-message").html("");
        $.ajax({
          url: `/superadmin/province/settings/update/${id}`,
          type: "post",
          data: {
            provinceName : provinceName,
            _token: '{{ csrf_token() }}'
            },
            success: function(result) {
                if (result.success == true) {
                      $('#province-table').DataTable().ajax.reload();
                      let idCurrent = $('#idCurrent').val();
                      $('#id').val(parseInt(idCurrent));
                      $('#provinceName').val('');
                      $("#provinceCancel").addClass('d-none');
                      $("#provinceUpdate").addClass('d-none');
                      $("#provinceCreate").removeClass('d-none');
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
                        url: `/superadmin/province/settings/destroy/${id}`,
                        type: "delete",
                        data: {
                            _token: '{{ csrf_token() }}'
                            },
                            success: function(result) {
                                if (result.success == true) {
                                    $('#province-table').DataTable().ajax.reload();
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
