@extends('user.layouts.app')
@section('title', 'Certification')
@section('certification', 'active')
@prepend('page-css')
<link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/vendors/datatables.css') }}">
@endprepend
@section('content')
<div class="page-body">
    <div class="container-fluid">
      <div class="page-title">
        <div class="row">
          <div class="col-sm-6">
            <h3>Resident Information</h3>
          </div>
        </div>
      </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
      <div class="row">
        <!-- Zero Configuration  Starts-->
        <div class="col-sm-12">
          <div class="card">
            <div class="card-body">
                <div class="col-12">
                  <div class="float-start pb-2">
                    <select class="form-select input-air-primary digits" name="certificate" id="certificate">
                      @foreach($certificate as $certificates)
                        <option value="{{ $certificates->id }}">{{ $certificates->description }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                  <div class="float-end pb-2">
                    <a id="btn_previewedprint_notresident" href="{{ 'certificate/previewedprint/1/1' }}"><button class="btn btn-success">Not Resident Print</button></a>
                  </div>
                </div>
                <table class="table table-hover" id="certificate-table">
                  <thead>
                    <tr>
                      <th>Full Name</th>
                      <th>Birthdate</th>
                      <th>Birthplace</th>
                      <th>Sex</th>
                      <th>Civil Status</th>
                      <th>Purok</th>
                      <th>House No</th>
                      <th>Zone</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Container-fluid Ends-->
  </div>
@push('page-scripts')
<script src="{{ asset('/assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/assets/js/datatable/datatables/datatable.custom.js') }}"></script>

<script>
    let table = $("#certificate-table").DataTable({
        processing: true,
        serverSide: true,
        pageLength: 10,
        pagingType: "full_numbers",
        ajax: `certificate/list/view`,
        columns: [
            { data: "fullname", name: "fullname" },
            { data: "birth_date", name: "birth_date" },
            { data: "birth_place", name: "birth_place" },
            { data: "sex", name: "sex" },
            { data: "civil_status", name: "civil_status" },
            { data: "household.house_hold_no", name: "household.house_hold_no" },
            { data: "household.purok", name: "household.purok" },
            { data: "household.zone", name: "household.zone" },
        ],
    });
    $('#certificate').change(function(){
      var type = $(this).val();
      $('#btn_previewedprint_notresident').attr('href','certificate/previewedprint/' + type + '/1');
    });



citizenship
</script>
@endpush
@endsection
