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
            <form action="{{ route('user.store.resident.information') }}" method="post">
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
                      <input class="form-control input-air-primary" name="firstname1" id="firstname1" type="text" placeholder="">
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="mb-3">
                      <label class="form-label">Middlename</label>
                      <input class="form-control input-air-primary" name="middlename1" id="middlename1" type="text" placeholder="">
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="mb-3">
                      <label class="form-label">Lastname</label>
                      <input class="form-control input-air-primary" name="lastname1" id="lastname1" type="text" placeholder="">
                    </div>
                  </div>
                  <div class="col-1">
                    <div class="mb-3">
                      <label class="form-label">Suffix</label>
                      <input class="form-control input-air-primary" name="suffix1" id="suffix1" type="text" placeholder="">
                    </div>
                  </div>
                  <div class="col-2">
                    <div class="mb-3">
                      <label class="form-label">Family Head</label>
                      <select class="form-select input-air-primary digits" name="familyHead1" id="familyHead1">
                        <option value="n">No</option>
                        <option value="y">Yes</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-2">
                    <div class="mb-3">
                      <label class="form-label">Birthdate</label>
                      <input class="form-control input-air-primary" name="birthDate1" id="birthDate1" type="date" placeholder="">
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="mb-3">
                      <label class="form-label">Birth Place</label>
                      <input class="form-control input-air-primary" name="birthPlace1" id="birthPlace1" type="text" placeholder="">
                    </div>
                  </div>
                  <div class="col-2">
                    <div class="mb-3">
                      <label class="form-label">Sex</label>
                      <select class="form-select input-air-primary digits" name="sex1" id="sex1">
                        <option></option>
                        <option value="m">Male</option>
                        <option value="f">Female</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-2">
                    <div class="mb-3">
                      <label class="form-label">Civil Status</label>
                      <select class="form-select input-air-primary digits" name="civilStatus1" id="civilStatus1">
                        <option></option>
                        <option value="Single">Single </option>
                        <option value="Married">Married</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="mb-3">
                      <label class="form-label">Citizenship</label>
                      <input class="form-control input-air-primary" name="citizenship1" id="citizenship1" type="text" placeholder="">
                    </div>
                  </div>
                </div>
                <div class="col-12 text-end">
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
       $(document).ready(function () {
        let checkSession = $('#session').val();
        if(checkSession == 'success')
        {
            window.localStorage.clear();
            swal("Successfully Added!", "", "success");
        }
    });

    $(document).on("click", "#cancel", function(e) {
        window.localStorage.clear();
    });


    $(document).on("click", "#submit", function(e) {
    var count = document.querySelectorAll("div#resident").length - 1;
    var array = '';
        for (let i = 0; i <= count; i++) {
            if(i == 0){
                array = document.querySelectorAll('div#resident')[i].getAttribute("name");
            }else{
                array = array.concat("|", document.querySelectorAll('div#resident')[i].getAttribute("name"));
            }
        }
        $('#valArray').val(array);
     });
 $(document).on("click", "#addNew", function(e) {
    let householdNo = $(`#householdNo`).val();
    let purok = $(`#purok`).val();
    let zone = $(`#zone`).val();
    let houseHold = householdNo + "|" + purok + "|" + zone;
    localStorage.setItem("houseHold", houseHold);

    var count = document.querySelectorAll("div#resident").length + 1;
    let length = $('.residentCount').length;
    for (let i = 1; i <= length; i++) {
            localStorage.removeItem('residentCount');
            let firstname = $(`#firstname` + i).val();
            let middlename = $(`#middlename` + i).val();
            let lastname = $(`#lastname` + i).val();
            let suffix = $(`#suffix` + i).val();
            let familyHead = $(`#familyHead` + i).val();
            let birthDate = $(`#birthDate` + i).val();
            let birthPlace = $(`#birthPlace` + i).val();
            let sex = $(`#sex` + i).val();
            let civilStatus = $(`#civilStatus` + i).val();
            let citizenship = $(`#citizenship` + i).val();
            let residentData = firstname + "|" + middlename + "|" + lastname + "|" + suffix + "|" + familyHead + "|" + birthDate + "|" + birthPlace + "|" + sex + "|" + civilStatus + "|" + citizenship ;
            localStorage.setItem("residentData" + i, residentData);
    }
    var count2 = document.querySelectorAll("div#resident").length - 1;
    var array2 = '';
        for (let i = 0; i <= count2; i++) {
            if(i == 0){
                array2 = document.querySelectorAll('div#resident')[i].getAttribute("name");
            }else{
                array2 = array2.concat("|", document.querySelectorAll('div#resident')[i].getAttribute("name"));
            }
        }
        localStorage.setItem("arrayOfResident", array2);
    $("#resident").append(`
    <hr class="mt-3 mb-3 mr-5">
    <div id="resident" name="`+count+`"  class="row residentCount resident`+count+`">
        <input class="form-control input-air-primary d-none" name="counter" id="counter" value="`+count+`" type="text" placeholder="">
                  <div class="col-3">
                    <div class="mb-3">
                      <label class="form-label">Firstname</label>
                      <input class="form-control input-air-primary" name="firstname`+count+`" id="firstname`+count+`" type="text" placeholder="">
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="mb-3">
                      <label class="form-label">Middlename</label>
                      <input class="form-control input-air-primary" name="middlename`+count+`" id="middlename`+count+`" type="text" placeholder="">
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="mb-3">
                      <label class="form-label">Lastname</label>
                      <input class="form-control input-air-primary" name="lastname`+count+`" id="lastname`+count+`" type="text" placeholder="">
                    </div>
                  </div>
                  <div class="col-1">
                    <div class="mb-3">
                      <label class="form-label">Suffix</label>
                      <input class="form-control input-air-primary" name="suffix`+count+`" id="suffix`+count+`" type="text" placeholder="">
                    </div>
                  </div>
                  <div class="col-2">
                    <div class="mb-3">
                      <label class="form-label">Family Head</label>
                      <select class="form-select input-air-primary digits" name="familyHead`+count+`" id="familyHead`+count+`">
                        <option value="n">No</option>
                        <option value="y">Yes</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-2">
                    <div class="mb-3">
                      <label class="form-label">Birthdate</label>
                      <input class="form-control input-air-primary" name="birthDate`+count+`" id="birthDate`+count+`" type="date" placeholder="">
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="mb-3">
                      <label class="form-label">Birth Place</label>
                      <input class="form-control input-air-primary" name="birthPlace`+count+`" id="birthPlace`+count+`" type="text" placeholder="">
                    </div>
                  </div>
                  <div class="col-2">
                    <div class="mb-3">
                      <label class="form-label">Sex</label>
                      <select class="form-select input-air-primary digits" name="sex`+count+`" id="sex`+count+`">
                        <option></option>
                        <option value="m">Male</option>
                        <option value="f">Female</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-2">
                    <div class="mb-3">
                      <label class="form-label">Civil Status</label>
                      <select class="form-select input-air-primary digits" name="civilStatus`+count+`" id="civilStatus`+count+`">
                        <option></option>
                        <option value="Single">Single </option>
                        <option value="Married">Married</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="mb-3">
                      <label class="form-label">Citizenship</label>
                      <input class="form-control input-air-primary" name="citizenship`+count+`" id="citizenship`+count+`" type="text" placeholder="">
                    </div>
                  </div>
                </div>
    `);
 });

    $(document).ready(function () {
        var houseHoldBackupResult = localStorage.getItem("houseHold");
        var houseHoldBackupResultDisplay = houseHoldBackupResult.split("|");
        $('#householdNo').val(houseHoldBackupResultDisplay[0]);
        $('#purok').val(houseHoldBackupResultDisplay[1]);
        $('#zone').val(houseHoldBackupResultDisplay[2]);
        var result = localStorage.getItem("arrayOfResident");
        var sample = result.split("|");
        var sample2 = sample.length - 1;
        for (let i = 0; i <= sample2; i++) {
            if(i == 0){
            var result = localStorage.getItem("residentData" + sample[i]);
            var residentDataSplit = result.split("|");
                $('#firstname1').val(residentDataSplit[0]);
                $('#middlename1').val(residentDataSplit[1]);
                $('#lastname1').val(residentDataSplit[2]);
                $('#suffix1').val(residentDataSplit[3]);
                $('#familyHead1').val(residentDataSplit[4]);
                $('#birthDate1').val(residentDataSplit[5]);
                $('#birthPlace1').val(residentDataSplit[6]);
                $('#sex1').val(residentDataSplit[7]);
                $('#civilStatus1').val(residentDataSplit[8]);
                $('#citizenship1').val(residentDataSplit[9]);
            }else{
            var result = localStorage.getItem("residentData" + sample[i]);
            var residentDataSplit = result.split("|");
            $("#resident").append(`
            <hr class="mt-3 mb-3 mr-5">
            <div id="resident" name="`+sample[i]+`"  class="row residentCount resident`+sample[i]+`">
                <input class="form-control input-air-primary d-none" name="counter" id="counter" type="text" placeholder="">
                <div class="col-3">
                    <div class="mb-3">
                    <label class="form-label">Firstname</label>
                    <input class="form-control input-air-primary" name="firstname`+sample[i]+`" id="firstname`+sample[i]+`" type="text" placeholder="">
                    </div>
                </div>
                <div class="col-3">
                    <div class="mb-3">
                    <label class="form-label">Middlename</label>
                    <input class="form-control input-air-primary" name="middlename`+sample[i]+`" id="middlename`+sample[i]+`" type="text" placeholder="">
                    </div>
                </div>
                <div class="col-3">
                    <div class="mb-3">
                    <label class="form-label">Lastname</label>
                    <input class="form-control input-air-primary" name="lastname`+sample[i]+`" id="lastname`+sample[i]+`" type="text" placeholder="">
                    </div>
                </div>
                <div class="col-1">
                    <div class="mb-3">
                    <label class="form-label">Suffix</label>
                    <input class="form-control input-air-primary" name="suffix`+sample[i]+`" id="suffix`+sample[i]+`" type="text" placeholder="">
                    </div>
                </div>
                <div class="col-2">
                    <div class="mb-3">
                    <label class="form-label">Family Head</label>
                    <select class="form-select input-air-primary digits" name="familyHead`+sample[i]+`" id="familyHead`+sample[i]+`">
                    <option value="n">No</option>
                    <option value="y">Yes</option>
                    </select>
                    </div>
                </div>
                <div class="col-2">
                    <div class="mb-3">
                    <label class="form-label">Birthdate</label>
                    <input class="form-control input-air-primary" name="birthDate`+sample[i]+`" id="birthDate`+sample[i]+`" type="date" placeholder="">
                    </div>
                </div>
                <div class="col-3">
                    <div class="mb-3">
                    <label class="form-label">Birth Place</label>
                    <input class="form-control input-air-primary" name="birthPlace`+sample[i]+`" id="birthPlace`+sample[i]+`" type="text" placeholder="">
                    </div>
                </div>
                <div class="col-2">
                    <div class="mb-3">
                    <label class="form-label">Sex</label>
                    <select class="form-select input-air-primary digits" name="sex`+sample[i]+`" id="sex`+sample[i]+`">
                        <option></option>
                        <option value="m">Male</option>
                        <option value="f">Female</option>
                    </select>
                    </div>
                </div>
                <div class="col-2">
                    <div class="mb-3">
                    <label class="form-label">Civil Status</label>
                    <select class="form-select input-air-primary digits" name="civilStatus`+sample[i]+`" id="civilStatus`+sample[i]+`">
                        <option></option>
                        <option value="Single">Single </option>
                        <option value="Married">Married</option>
                    </select>
                    </div>
                </div>
                <div class="col-3">
                    <div class="mb-3">
                    <label class="form-label">Citizenship</label>
                    <input class="form-control input-air-primary" name="citizenship`+sample[i]+`" id="citizenship`+sample[i]+`" type="text" placeholder="">
                    </div>
                </div>
            </div>
        `);
        $(`#firstname`+sample[i]).val(residentDataSplit[0]);
        $(`#middlename`+sample[i]).val(residentDataSplit[1]);
        $(`#lastname`+sample[i]).val(residentDataSplit[2]);
        $(`#suffix`+sample[i]).val(residentDataSplit[3]);
        $(`#familyHead`+sample[i]).val(residentDataSplit[4]);
        $(`#birthDate`+sample[i]).val(residentDataSplit[5]);
        $(`#birthPlace`+sample[i]).val(residentDataSplit[6]);
        $(`#sex`+sample[i]).val(residentDataSplit[7]);
        $(`#civilStatus`+sample[i]).val(residentDataSplit[8]);
        $(`#citizenship`+sample[i]).val(residentDataSplit[9]);
        }
        }
    });
</script>
@endpush
@endsection
