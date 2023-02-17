@extends('user.layouts.app')
@section('title', 'Create Resident Information')
@prepend('page-css')
@endprepend
@section('content')
<div class="page-body">
    <div class="container-fluid">
      <div class="page-title">
        <div class="row">
          <div class="col-sm-12">
            <h3>Create Resident Info</h3>
          </div>
        </div>
      </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-12">
          <div class="card">
            <div class="card-header pb-0">
                <h4>House Hold</h4>
              </div>
            <form id="houseHoldAndResidentForm">
            {{-- <form id="residentDataAll" class="form theme-form"> --}}
                @csrf
              <div class="card-body">
                <div class="row">
                    <div class="col-4">
                        <div class="mb-3">
                          <label class="form-label">Household No.</label>
                          <input class="form-control input-air-primary input-air-primary"  name="householdNo" id="householdNo" type="text" placeholder="">
                        </div>
                      </div>
                  <div class="col-4">
                    <div class="mb-3">
                      <label class="form-label">Purok</label>
                      <select class="form-select input-air-primary digits" name="purok" id="purok">
                        <option></option>
                        @foreach ($purok as $puroks)
                            <option value="{{ $puroks->id }}">{{ $puroks->description }}</option>
                        @endforeach
                      </select>
                      <p id="purokMessage" class="text-danger d-none">Purok Required</p>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="mb-3">
                      <label class="form-label">Zone</label>
                      <select class="form-select input-air-primary digits" name="zone" id="zone">
                        <option></option>
                        @foreach ($zone as $zones)
                            <option value="{{ $zones->id }}">{{ $zones->description }}</option>
                        @endforeach
                      </select>
                      <p id="zoneMessage" class="text-danger d-none">Zone Required</p>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="table-responsive">
                        <table class="table table-hover">
                          <thead class="table-secondary">
                            <tr>
                              <th scope="col">Firstname</th>
                              <th scope="col">Middlename</th>
                              <th scope="col">Lastname</th>
                              <th scope="col">Suffix</th>
                              <th scope="col">Family Head</th>
                              <th scope="col">Sex</th>
                              <th scope="col">Civil Status</th>
                              <th scope="col">Action</th>
                            </tr>
                          </thead>
                          <tbody id="residentAdded">
                          </tbody>
                        </table>
                      </div>
                  </div>
                </div>
              </div>



              <div class="card-header pb-0">
                <h4>Resident</h4>
              </div>
              <div class="card-body">
                  <div id="resident" name="1"  class="resident1 residentCount row">
                  <input class="form-control d-none input-air-primary" name="counter" id="counter" value="1" type="text" placeholder="">
                  <div class="col-3">
                    <div class="mb-3">
                      <label class="form-label">Firstname</label>
                      <input class="form-control input-air-primary" name="firstname" id="firstname" type="text" placeholder="">
                      <p id="firstnameMessage" class="text-danger d-none">Firstname Required</p>
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="mb-3">
                      <label class="form-label">Middlename</label>
                      <input class="form-control input-air-primary" name="middlename" id="middlename" type="text" placeholder="">
                      <p id="middlenameMessage" class="text-danger d-none">Middlename Required</p>
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="mb-3">
                      <label class="form-label">Lastname</label>
                      <input class="form-control input-air-primary" name="lastname" id="lastname" type="text" placeholder="">
                      <p id="lastnameMessage" class="text-danger d-none">Lastname Required</p>
                    </div>
                  </div>
                  <div class="col-1">
                    <div class="mb-3">
                      <label class="form-label">Suffix</label>
                      <input class="form-control input-air-primary" name="suffix" id="suffix" type="text" placeholder="">
                    </div>
                  </div>
                  <div class="col-2">
                    <div class="mb-3">
                      <label class="form-label">Family Head</label>
                      <select class="form-select input-air-primary digits" name="familyHead" id="familyHead">
                        <option value="No">No</option>
                        <option value="Yes">Yes</option>
                      </select>
                      <p id="familyHeadMessage" class="text-danger d-none">Family Head Required</p>
                    </div>
                  </div>
                  <div class="col-2">
                    <div class="mb-3">
                      <label class="form-label">Birthdate</label>
                      <input class="form-control input-air-primary" name="birthDate" id="birthDate" type="date" placeholder="">
                      <p id="birthDateMessage" class="text-danger d-none">BirthDate Required</p>
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="mb-3">
                      <label class="form-label">Birth Place</label>
                      <input class="form-control input-air-primary" name="birthPlace" id="birthPlace" type="text" placeholder="">
                      <p id="birthPlaceMessage" class="text-danger d-none">Birth Place Required</p>
                    </div>
                  </div>
                  <div class="col-2">
                    <div class="mb-3">
                      <label class="form-label">Sex</label>
                      <select class="form-select input-air-primary digits" name="sex" id="sex">
                        <option></option>
                        <option value="Male">Male</option>
                        <option value="female">Female</option>
                      </select>
                      <p id="sexMessage" class="text-danger d-none">Sex Required</p>
                    </div>
                  </div>
                  <div class="col-2">
                    <div class="mb-3">
                      <label class="form-label">Civil Status</label>
                      <select class="form-select input-air-primary digits" name="civilStatus" id="civilStatus">
                        <option></option>
                        <option value="Single">Single </option>
                        <option value="Married">Married</option>
                      </select>
                      <p id="civilStatusMessage" class="text-danger d-none">Civil Status Required</p>
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="mb-3">
                      <label class="form-label">Citizenship</label>
                      <input class="form-control input-air-primary" name="citizenship" id="citizenship" type="text" placeholder="">
                      <p id="citizenshipMessage" class="text-danger d-none">Citizenship Required</p>
                    </div>
                  </div>
                </div>
                <div class="col-12 text-end">
                    <button id="btnCancelEdit" value="" name="" class="btn btn-secondary d-none" type="button">Cancel</button>
                    <button id="btUpdate" value="" name="" class="btn btn-success d-none" type="button">Update</button>
                    <button id="addNew" class="btn btn-secondary" type="button">Add</button>
                  </div>
              </div>
              <input class="d-none" name="valArray" id="valArray" type="text">
              <input class="d-none" type="text" value="{{ session('message') }}" id="session">
              <div class="card-footer text-end">
                <input id="cancel" class="btn btn-light" type="reset" value="Cancel">
                <button class="btn btn-primary" id="submit" type="submit">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Container-fluid Ends-->
  </div>
@push('page-scripts')
<script>
    // add new data to save in database
    $(document).on("click", "#addNew", function(e) {
        if(
            $(`#householdNo`).val() == '' ||
            $(`#purok`).val() == '' ||
            $(`#zone`).val() == '' ||
            $(`#firstname`).val() == '' ||
            $(`#middlename`).val() == '' ||
            $(`#lastname`).val() == '' ||
            $(`#suffix`).val() == '' ||
            $(`#familyHead`).val() == '' ||
            $(`#birthDate`).val() == '' ||
            $(`#birthPlace`).val() == '' ||
            $(`#sex`).val() == '' ||
            $(`#civilStatus`).val() == '' ||
            $(`#citizenship`).val() == ''
        ){
            if($(`#purok`).val() == ''){
                $(`#purokMessage`).removeClass('d-none');
                $(`#purok`).addClass('is-invalid');
            }
            if($(`#zone`).val() == ''){
                $(`#zoneMessage`).removeClass('d-none');
                $(`#zone`).addClass('is-invalid');
            }
            if($(`#firstname`).val() == ''){
                $(`#firstnameMessage`).removeClass('d-none');
                $(`#firstname`).addClass('is-invalid');
            }
            if($(`#middlename`).val() == ''){
                $(`#middlenameMessage`).removeClass('d-none');
                $(`#middlename`).addClass('is-invalid');
            }
            if($(`#lastname`).val() == ''){
                $(`#lastnameMessage`).removeClass('d-none');
                $(`#lastname`).addClass('is-invalid');
            }
            if($(`#suffix`).val() == ''){
                $(`#suffixMessage`).removeClass('d-none');
                $(`#suffix`).addClass('is-invalid');
            }
            if($(`#familyHead`).val() == ''){
                $(`#familyHeadMessage`).removeClass('d-none');
                $(`#familyHead`).addClass('is-invalid');
            }
            if($(`#birthDate`).val() == ''){
                $(`#birthDateMessage`).removeClass('d-none');
                $(`#birthDate`).addClass('is-invalid');
            }
            if($(`#birthPlace`).val() == ''){
                $(`#birthPlaceMessage`).removeClass('d-none');
                $(`#birthPlace`).addClass('is-invalid');
            }
            if($(`#sex`).val() == ''){
                $(`#sexMessage`).removeClass('d-none');
                $(`#sex`).addClass('is-invalid');
            }
            if($(`#civilStatus`).val() == ''){
                $(`#civilStatusMessage`).removeClass('d-none');
                $(`#civilStatus`).addClass('is-invalid');
            }
            if($(`#citizenship`).val() == ''){
                $(`#citizenshipMessage`).removeClass('d-none');
                $(`#citizenship`).addClass('is-invalid');
            }
        }else{
            // remove errors
            if(`#purok`){
                $(`#purokMessage`).addClass('d-none');
                $(`#purok`).removeClass('is-invalid');
            }
            if(`#zone`){
                $(`#zoneMessage`).addClass('d-none');
                $(`#zone`).removeClass('is-invalid');
            }
            if(`#firstname`){
                $(`#firstnameMessage`).addClass('d-none');
                $(`#firstname`).removeClass('is-invalid');
            }
            if(`#middlename`){
                $(`#middlenameMessage`).addClass('d-none');
                $(`#middlename`).removeClass('is-invalid');
            }
            if(`#lastname`){
                $(`#lastnameMessage`).addClass('d-none');
                $(`#lastname`).removeClass('is-invalid');
            }
            if(`#suffix`){
                $(`#suffixMessage`).addClass('d-none');
                $(`#suffix`).removeClass('is-invalid');
            }
            if(`#familyHead`){
                $(`#familyHeadMessage`).addClass('d-none');
                $(`#familyHead`).removeClass('is-invalid');
            }
            if(`#birthDate`){
                $(`#birthDateMessage`).addClass('d-none');
                $(`#birthDate`).removeClass('is-invalid');
            }
            if(`#birthPlace`){
                $(`#birthPlaceMessage`).addClass('d-none');
                $(`#birthPlace`).removeClass('is-invalid');
            }
            if(`#sex`){
                $(`#sexMessage`).addClass('d-none');
                $(`#sex`).removeClass('is-invalid');
            }
            if(`#civilStatus`){
                $(`#civilStatusMessage`).addClass('d-none');
                $(`#civilStatus`).removeClass('is-invalid');
            }
            if(`#citizenship`){
                $(`#citizenshipMessage`).addClass('d-none');
                $(`#citizenship`).removeClass('is-invalid');
            }
        // insert values to local storage
        let householdNo = $(`#householdNo`).val();
        let purok = $(`#purok`).val();
        let zone = $(`#zone`).val();
        let houseHold = householdNo + "|" + purok + "|" + zone;
        localStorage.setItem("houseHold", houseHold);
        if($('.residentAddedRow').length == 0 || $('.residentAddedRow').length == "0"){
          var length = 1;
        }else{
          let residentAddedRow_last = $('.residentAddedRow').length - 1;
          var length = parseInt(document.querySelectorAll('.residentAddedRow')[residentAddedRow_last].getAttribute('name')) + parseInt(1);
        }
        let firstname = $(`#firstname`).val();
        let middlename = $(`#middlename`).val();
        let lastname = $(`#lastname`).val();
        let suffix = $(`#suffix`).val();
        let familyHead = $(`#familyHead`).val();
        let birthDate = $(`#birthDate`).val();
        let birthPlace = $(`#birthPlace`).val();
        let sex = $(`#sex`).val();
        let civilStatus = $(`#civilStatus`).val();
        let citizenship = $(`#citizenship`).val();
        let residentAddedRows = firstname + "|" + middlename + "|" + lastname + "|" + suffix + "|" + familyHead + "|" + birthDate + "|" + birthPlace + "|" + sex + "|" + civilStatus + "|" + citizenship ;
        localStorage.setItem("residentAddedRowStore" + length, residentAddedRows);
        // clear all fields
        $("#firstname").val('');
        $("#middlename").val('');
        $("#lastname").val('');
        $("#suffix").val('');
        $("#familyHead").val('');
        $("#birthDate").val('');
        $("#birthPlace").val('');
        $("#sex").val('');
        $("#civilStatus").val('');
        $("#citizenship").val('');
        // append and show added data to table
        $("#residentAdded").append(`
            <tr id="residentAddedRow" value="`+length+`" name="`+length+`" class="residentAddedRow deleteRow`+length+`">
                <th id="firstnameUpdate`+length+`">`+firstname+`</th>
                <td id="middlenameUpdate`+length+`">`+middlename+`</td>
                <td id="lastnameUpdate`+length+`">`+lastname+`</td>
                <td id="suffixUpdate`+length+`">`+suffix+`</td>
                <td id="familyHeadUpdate`+length+`">`+familyHead+`</td>
                <td id="sexUpdate`+length+`">`+sex+`</td>
                <td id="civilStatusUpdate`+length+`">`+civilStatus+`</td>
                <td><button class="btnEdit btn btn-primary" value="`+length+`" id="residentAddedRowStore`+length+`" type="button">Edit</button><button id="residentAddedRowStore`+length+`" value="`+length+`" class="btnDelete btn btn-danger" type="button">Remove</button></td>
            </tr>
        `);
        // count row of added data from table and save to local storage
        let lengthAddedInRow = document.querySelectorAll('tr#residentAddedRow').length - 1;
        var lengthAddedInRowArray = '';
        for (let i = 0; i <= lengthAddedInRow; i++) {
            if(i == 0){
                lengthAddedInRowArray = document.querySelectorAll('tr#residentAddedRow')[i].getAttribute("name");
                // alert(lengthAddedInRowArray);
            }else{
                lengthAddedInRowArray = lengthAddedInRowArray.concat("|", document.querySelectorAll('tr#residentAddedRow')[i].getAttribute("name"));
                // alert(lengthAddedInRowArray);
            }
        }
        localStorage.setItem("lengthAddedInRowArray", lengthAddedInRowArray);
        swal("Added Row Successfully!", "", "success");
        }
    });


    // display data from local storage if close
    $(document).ready(function () {
        // display data of household from data storage
        var houseHoldBackupResult = localStorage.getItem("houseHold");
        var houseHoldBackupResultDisplay = houseHoldBackupResult.split("|");
        $('#householdNo').val(houseHoldBackupResultDisplay[0]);
        $('#purok').val(houseHoldBackupResultDisplay[1]);
        $('#zone').val(houseHoldBackupResultDisplay[2]);
        // display data of added list of resident from data tables
        var lengthAddedInRowArrayResult = localStorage.getItem("lengthAddedInRowArray");
        var lengthAddedInRowArrayResultDisplay = lengthAddedInRowArrayResult.split("|");
        var lengthAddedInRowArrayResultDisplayLoop = lengthAddedInRowArrayResultDisplay.length - 1;
        for (let i = 0; i <= lengthAddedInRowArrayResultDisplayLoop; i++) {
        var result = localStorage.getItem("residentAddedRowStore" + lengthAddedInRowArrayResultDisplay[i]);
        var resultToDisplay = result.split("|");
        $("#residentAdded").append(`
            <tr id="residentAddedRow" value="`+lengthAddedInRowArrayResultDisplay[i]+`" name="`+lengthAddedInRowArrayResultDisplay[i]+`" class="residentAddedRow deleteRow`+lengthAddedInRowArrayResultDisplay[i]+`">
                <td id="firstnameUpdate`+lengthAddedInRowArrayResultDisplay[i]+`">`+resultToDisplay[0]+`</th>
                <td id="middlenameUpdate`+lengthAddedInRowArrayResultDisplay[i]+`">`+resultToDisplay[1]+`</td>
                <td id="lastnameUpdate`+lengthAddedInRowArrayResultDisplay[i]+`">`+resultToDisplay[2]+`</td>
                <td id="suffixUpdate`+lengthAddedInRowArrayResultDisplay[i]+`">`+resultToDisplay[3]+`</td>
                <td id="familyHeadUpdate`+lengthAddedInRowArrayResultDisplay[i]+`">`+resultToDisplay[4]+`</td>
                <td id="sexUpdate`+lengthAddedInRowArrayResultDisplay[i]+`">`+resultToDisplay[7]+`</td>
                <td id="civilStatusUpdate`+lengthAddedInRowArrayResultDisplay[i]+`">`+resultToDisplay[8]+`</td>
                <td><button class="btnEdit btn btn-primary" value="`+lengthAddedInRowArrayResultDisplay[i]+`" id="residentAddedRowStore`+lengthAddedInRowArrayResultDisplay[i]+`" type="button">Edit</button><button id="residentAddedRowStore`+lengthAddedInRowArrayResultDisplay[i]+`"  value="`+lengthAddedInRowArrayResultDisplay[i]+`" class="btnDelete btn btn-danger" type="button">Remove</button></td>
            </tr>
        `);
        }
    });

    // click edit and display the data
    $(document).on("click", ".btnEdit", function(e) {
      let rowName = e.target.id;
      let rowValue = e.target.value;
      $("#btUpdate").attr('name', rowName);
      $("#btUpdate").attr('value', rowValue);
      $('#btnCancelEdit').removeClass('d-none');
      $('#addNew').addClass('d-none');
      $('#btUpdate').removeClass('d-none');
      let resultForEdit = localStorage.getItem(rowName);
      let resultToDisplayEdit = resultForEdit.split("|");
      $("#firstname").val(resultToDisplayEdit[0]);
      $("#middlename").val(resultToDisplayEdit[1]);
      $("#lastname").val(resultToDisplayEdit[2]);
      $("#suffix").val(resultToDisplayEdit[3]);
      $("#familyHead").val(resultToDisplayEdit[4]);
      $("#birthDate").val(resultToDisplayEdit[5]);
      $("#birthPlace").val(resultToDisplayEdit[6]);
      $("#sex").val(resultToDisplayEdit[7]);
      $("#civilStatus").val(resultToDisplayEdit[8]);
      $("#citizenship").val(resultToDisplayEdit[9]);
    });

    // cancel edit
    $(document).on("click", "#btnCancelEdit", function(e) {
        $("#firstname").val('');
        $("#middlename").val('');
        $("#lastname").val('');
        $("#suffix").val('');
        $("#familyHead").val('');
        $("#birthDate").val('');
        $("#birthPlace").val('');
        $("#sex").val('');
        $("#civilStatus").val('');
        $("#citizenship").val('');
        $('#addNew').removeClass('d-none');
        $('#btnCancelEdit').addClass('d-none');
        $('#btUpdate').addClass('d-none');
        swal("Row Update Cancel!", "", "error");
    });

    // update data to localstorage
    $(document).on("click", "#btUpdate", function(e) {
      let idUpdate = e.target.value;
      let rowNameUpdate = e.target.name;
      // get new value in inputs
      let firstname = $(`#firstname`).val();
      let middlename = $(`#middlename`).val();
      let lastname = $(`#lastname`).val();
      let suffix = $(`#suffix`).val();
      let familyHead = $(`#familyHead`).val();
      let birthDate = $(`#birthDate`).val();
      let birthPlace = $(`#birthPlace`).val();
      let sex = $(`#sex`).val();
      let civilStatus = $(`#civilStatus`).val();
      let citizenship = $(`#citizenship`).val();
      // update the local storage
      let updateDetails = firstname + "|" + middlename + "|" + lastname + "|" + suffix + "|" +familyHead + "|" +birthDate + "|" +birthPlace + "|" +sex + "|" +civilStatus + "|" +citizenship;
      localStorage.setItem(rowNameUpdate, updateDetails);
      // update table display
      $(`#firstnameUpdate`+idUpdate).text(firstname);
      $(`#middlenameUpdate`+idUpdate).text(middlename);
      $(`#lastnameUpdate`+idUpdate).text(lastname);
      $(`#suffixUpdate`+idUpdate).text(suffix);
      $(`#familyHeadUpdate`+idUpdate).text(familyHead);
      $(`#birthDateUpdate`+idUpdate).text(birthDate);
      $(`#birthPlaceUpdate`+idUpdate).text(birthPlace);
      $(`#sexUpdate`+idUpdate).text(sex);
      $(`#civilStatusUpdate`+idUpdate).text(civilStatus);
      $(`#citizenshipUpdate`+idUpdate).text(citizenship);
      // clear the inputs
      $("#firstname").val('');
      $("#middlename").val('');
      $("#lastname").val('');
      $("#suffix").val('');
      $("#familyHead").val('');
      $("#birthDate").val('');
      $("#birthPlace").val('');
      $("#sex").val('');
      $("#civilStatus").val('');
      $("#citizenship").val('');
      $('#addNew').removeClass('d-none');
      $('#btnCancelEdit').addClass('d-none');
      $('#btUpdate').addClass('d-none');
      swal("Row Updated Successfully!", "", "success");
    });


    $(document).on("click", ".btnDelete", function(e) {
      swal({
        title: "Are you sure?",
        text: "Once remove, you will not be able to recover row!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          let idDelete = e.target.value;
          let rowNameDelete = e.target.id;
          window.localStorage.removeItem(rowNameDelete);
          $('.deleteRow'+idDelete).remove();
          let lengthAddedInRow = document.querySelectorAll('tr#residentAddedRow').length - 1;
            var lengthAddedInRowArray = '';
            for (let i = 0; i <= lengthAddedInRow; i++) {
                if(i == 0){
                    lengthAddedInRowArray = document.querySelectorAll('tr#residentAddedRow')[i].getAttribute("name");
                }else{
                    lengthAddedInRowArray = lengthAddedInRowArray.concat("|", document.querySelectorAll('tr#residentAddedRow')[i].getAttribute("name"));
                }
            }
            localStorage.setItem("lengthAddedInRowArray", lengthAddedInRowArray);
            swal("Row Remove Successfully!", "", "success");
        }
      });
    });

    $("#houseHoldAndResidentForm").submit(function (e) {
        e.preventDefault();
        let count = $('.residentAddedRow').length - 1;
        let arrayValue = localStorage.getItem('lengthAddedInRowArray');
        var splitValue = arrayValue.split('|');
        localStorage.removeItem('residentAddedRowStoreListArray');
        for(let i= 0; i <= count; i++){
        let residentAddedRowStoreList = localStorage.getItem('residentAddedRowStore' + splitValue[i]);
            let checker = localStorage.getItem('residentAddedRowStoreListArray');
            if(checker == null){
                localStorage.setItem("residentAddedRowStoreListArray", residentAddedRowStoreList + "~~");
            }else{
                if(count == i){
                    localStorage.setItem("residentAddedRowStoreListArray", checker + residentAddedRowStoreList);
                }else{
                    localStorage.setItem("residentAddedRowStoreListArray", checker + residentAddedRowStoreList + "~~");
                }
            }
        }
        $.ajax({
                url: `{{ route('user.store.resident.information') }}`,
                method: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    houseHoldData : localStorage.getItem('houseHold'),
                    residentdata : localStorage.getItem('residentAddedRowStoreListArray'),
                },
                success: function (result) {
                    if (result.success) {
                        if(`#purok`){
                            $(`#purokMessage`).addClass('d-none');
                            $(`#purok`).removeClass('is-invalid');
                        }
                        if(`#zone`){
                            $(`#zoneMessage`).addClass('d-none');
                            $(`#zone`).removeClass('is-invalid');
                        }
                        if(`#firstname`){
                            $(`#firstnameMessage`).addClass('d-none');
                            $(`#firstname`).removeClass('is-invalid');
                        }
                        if(`#middlename`){
                            $(`#middlenameMessage`).addClass('d-none');
                            $(`#middlename`).removeClass('is-invalid');
                        }
                        if(`#lastname`){
                            $(`#lastnameMessage`).addClass('d-none');
                            $(`#lastname`).removeClass('is-invalid');
                        }
                        if(`#suffix`){
                            $(`#suffixMessage`).addClass('d-none');
                            $(`#suffix`).removeClass('is-invalid');
                        }
                        if(`#familyHead`){
                            $(`#familyHeadMessage`).addClass('d-none');
                            $(`#familyHead`).removeClass('is-invalid');
                        }
                        if(`#birthDate`){
                            $(`#birthDateMessage`).addClass('d-none');
                            $(`#birthDate`).removeClass('is-invalid');
                        }
                        if(`#birthPlace`){
                            $(`#birthPlaceMessage`).addClass('d-none');
                            $(`#birthPlace`).removeClass('is-invalid');
                        }
                        if(`#sex`){
                            $(`#sexMessage`).addClass('d-none');
                            $(`#sex`).removeClass('is-invalid');
                        }
                        if(`#civilStatus`){
                            $(`#civilStatusMessage`).addClass('d-none');
                            $(`#civilStatus`).removeClass('is-invalid');
                        }
                        if(`#citizenship`){
                            $(`#citizenshipMessage`).addClass('d-none');
                            $(`#citizenship`).removeClass('is-invalid');
                        }
                        $("#householdNo").val('');
                        $("#purok").val('');
                        $("#zone").val('');
                        $('.residentAddedRow').remove();
                        window.localStorage.clear();
                        swal("Added Successfully!", "", "success");
                    }
                }
            });
    });



</script>
@endpush
@endsection
