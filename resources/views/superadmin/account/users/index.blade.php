@extends('superadmin.layouts.app')
@section('title', 'account - user')
@section('dashboard', 'active')
@prepend('page-css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap5.min.css">
{{-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap5.min.css"> --}}
@endprepend
@section('content')
<div class="page-body">
    <div class="container-fluid">
      <div class="page-title">
        <div class="row">
          <div class="col-sm-12">
            <h3>Add New User</h3>
          </div>
        </div>
      </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 ">
          <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="btn-showcase float-right pb-3">
                            <!-- Large modal-->
                            <input class="d-none" type="text" value="{{ session('message') }}" id="session">
                            <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg">Add New</button>
                            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                              <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h4 class="modal-title" id="myLargeModalLabel">Add New Account</h4>
                                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                    <form action="{{ route('account.store.superadmin') }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="mb-3">
                                              <label class="form-label" for="">Userame</label>
                                              <input class="form-control" name="username" type="text" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="mb-3">
                                              <label class="form-label" for="">Password</label>
                                              <input class="form-control" name="password" value="password" type="text" placeholder="*****">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="mb-3">
                                              <label class="form-label" for="">Account Level</label>
                                              <select class="form-control" name="account_level">
                                                    <option value="0">User</option>
                                                    <option value="1">Super User</option>
                                              </select>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="mb-3">
                                              <label class="form-label" for="">FirstName</label>
                                              <input class="form-control" name="firstname" type="text" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="mb-3">
                                              <label class="form-label" for="">Middlename</label>
                                              <input class="form-control" name="middlename" type="text" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="mb-3">
                                              <label class="form-label" for="">Lastname</label>
                                              <input class="form-control" name="lastname" type="text" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-6 d-none">
                                            <div class="mb-3">
                                              <label class="form-label" for="">Role</label>
                                              <input class="form-control" value="0" name="role" type="text" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="mb-3">
                                              <label class="form-label" for="">Region</label>
                                              <select class="form-control" name="region">
                                                @foreach ($region as $regions)
                                                    <option value="{{ $regions->id }}">{{ $regions->description }}</option>
                                                @endforeach
                                              </select>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="mb-3">
                                              <label class="form-label" for="">Province</label>
                                              <select class="form-control" name="province">
                                                @foreach ($province as $provinces)
                                                    <option value="{{ $provinces->id }}">{{ $provinces->description }}</option>
                                                @endforeach
                                              </select>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="mb-3">
                                              <label class="form-label" for="">Municipality</label>
                                              <select class="form-control" name="municipality">
                                                @foreach ($municipality as $municipalities)
                                                    <option value="{{ $municipalities->id }}">{{ $municipalities->description }}</option>
                                                @endforeach
                                              </select>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="mb-3">
                                              <label class="form-label" for="">Barangay</label>
                                              <select class="form-control" name="barangay">
                                                @foreach ($barangay as $barangays)
                                                    <option value="{{ $barangays->id }}">{{ $barangays->description }}</option>
                                                @endforeach
                                              </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col ">
                                        <div class="float-right">
                                            <button class="btn btn-primary" type="submit">Create</button>
                                        </div>
                                    </div>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                    </div>

                    <div class="col-md-12">
                        <table id="user-table" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Fullname</th>
                                    <th>Username</th>
                                    <th>Account Level</th>
                                    <th>Barangay</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
                      </div>
                </div>

            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Container-fluid Ends-->
  </div>
@push('page-scripts')
<script>
    $(document).ready(function () {
        var table = $('#user-table').DataTable({
            processing: true,
            serverSide: true,
            order: [[0, 'desc']],
            ajax: "{{ route('account.list.superadmin') }}",
            columns: [
                {data: 'id', name: 'id'},
                {data: 'username', name: 'username'},
                {data: 'username', name: 'username'},
                {   data: 'account_level',
                    name: 'account_level',
                    render: function (data, type, row, meta) {
                        if(data == 0){
                            return 'User';
                        }else if(data == 1){
                            return 'SuperUser';
                        }else{
                            return '';
                        }
                    }
                },
                {data: 'barangay',name: 'barangay'},
                {data: 'action', name: 'action'}
            ]
        });
    });


    $(document).ready(function () {
        let checkSession = $('#session').val();
        if(checkSession == 'success')
        {
            swal("Successfully Added!", "", "success");
        }
    });
</script>
<script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js"></script>
@endpush
@endsection
