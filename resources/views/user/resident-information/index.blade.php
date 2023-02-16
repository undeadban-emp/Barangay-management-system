@extends('user.layouts.app')
@section('title', 'Resident Information')
@section('dashboard', 'active')
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
                    <div class="float-end pb-2">
                        <a href="{{ route('user.create.resident.information') }}"><button class="btn btn-success">Create</button></a>
                    </div>
                </div>
                <table class="display" id="basic-1">
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
@endpush
@endsection
