@extends('user.layouts.app')
@section('title', 'Barangay Information')
@section('dashboard', 'active')
@prepend('page-css')
@endprepend
@section('content')
<div class="page-body">
    <div class="container-fluid">
      <div class="page-title">
        <div class="row">
          <div class="col-sm-12">
            <h3>Barangay Information</h3>
          </div>
          
        </div>
      </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid add-product">
      <div class="row"> 

        <div class="col-xl-6">
            <div class="card"> 
              <div class="card-body">
                <div class="product-info">
                  <h5>Barangay Logo</h5>
                  <div class="row">
                    <div class="col-6">
                        <img class="img-fluid" src="../assets/images/ecommerce/card.png" alt="">
                    </div>
                    <div class="col-6">
                        <form class="dropzone" id="" action="https://admin.pixelstrap.com/upload.php">
                            <div class="dz-message needsclick"><i data-feather="download-cloud"> </i>
                              <h6>Drop files here or click to upload.</h6><span class="note needsclick"></span>
                            </div>
                        </form>
                    </div>
                  </div>
                </div>
                <div class="mt-4">
                  <div class="row"> 
                    <div class="col-sm-12 text-end"><a class="btn btn-primary me-3" href="product.html">ADD </a><a class="btn btn-secondary">Cancel</a></div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        <div class="col-xl-6">
          <div class="card">
            <div class="card-body">
                <div class="product-info">
                <h5>Description</h5>
                <form>
                  <div class="product-group">
                    <div class="row"> 
                      <div class="col-sm-12">
                        <div class="mb-3">
                          <label class="form-label">Barangay Name</label>
                          <input class="form-control" placeholder="" type="text"><span class="text-danger"></span>
                        </div>
                      </div>
                    </div>
                    <div class="row"> 
                      <div class="col-sm-12">
                        <div class="mb-3">
                          <label class="form-label">Municipality</label>
                          <select class="form-select">
                            <option>S </option>
                            <option>M </option>
                            <option>L </option>
                            <option>XL </option>
                            <option>XXL</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row"> 
                        <div class="col-sm-12">
                          <div class="mb-3">
                            <label class="form-label">Province</label>
                            <select class="form-select">
                              <option>S </option>
                              <option>M </option>
                              <option>L </option>
                              <option>XL </option>
                              <option>XXL</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="row"> 
                        <div class="col-sm-12">
                          <div class="mb-3">
                            <label class="form-label">Phone Number</label>
                            <input class="form-control" placeholder="" type="text"><span class="text-danger"></span>
                          </div>
                        </div>
                      </div>
    
                      <div class="row"> 
                        <div class="col-sm-12">
                          <div class="mb-3">
                            <label class="form-label">Email Address</label>
                            <input class="form-control" placeholder="" type="email"><span class="text-danger"></span>
                          </div>
                        </div>
                      </div>
                  </div>
                  
                </form>
              </div>
            </div>
          </div>
        </div>
        
      </div>
    </div>
    <!-- Container-fluid Ends-->
  </div>
@push('page-scripts')
@endpush
@endsection