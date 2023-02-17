
@extends('user.layouts.app')
@section('title', 'Certification')
@section('certification', 'active')
@prepend('page-css')
<link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/vendors/datatables.css') }}">
@endprepend
@section('content')

    <style>
        .card {
            padding: 40px 40px;
            margin: auto;
        }

        .text-indent{
            text-indent: 50px;
        }

        .header-text:nth-of-type(2) {
            text-align: center;
            position: relative;
        }

        .d-flex {
            display: flex;
            text-align: justify;
        }

        .float-right {
            float: right;
        }

        .pl-5 {
            margin-left: 3rem;
        }

        .logo {
            background: url('/assets/img/sdslogo.jpg');
            position: absolute;
            margin-left: -2rem;
        }


    </style>
<div class="page-body">
    <!-- Container-fluid starts-->
    <div class="">
        <div class="row">
            <!-- Zero Configuration  Starts-->
            <div class="col-sm-12">
                <div class="">
                    <div class="">
                    {{-- BUTTONS --}}
<div id='action-buttons' class="float-right mb-2">
    <a class="btn btn-success" name=""  id="downloadBtn"><i class="las la-download"></i>&nbspDownload</a>
    <a class="btn btn-primary" name="" id="printBtn"><i class="la la-print"></i>&nbspPrint</a>
</div>
<div class="clearfix"></div>

<div class="card" id='main-container'>
    <div class="card-header pl-5 pr-5" id="headingOne">
        {{-- HEADING --}}
        <div class="body-container">
            <div class="w-25">
                <img src="/assets/images/printimage/province.png" width="165px">
            </div>
            <center>
                <div class="text-center" style="margin-top: -180px;font-family: serif;">
                    <span class="h4">Republic of the Philippines</span><br>
                    <span class="h3">Province of Surigao del Sur</span>
                    <h2>City of Tandag</h2>
                    <h2>BARANGAY BAG-ONG LUNGSOD</h2>
                    <span style="font-size:20px; margin-right:-20px;"><b>-</b></span>
                    <span style="font-size:20px; margin-right:-5px;"><b><i style="visibility:hidden;">o</i>o</b></span>
                    <span style="font-size:20px;"><b>Oo-</b></span>

                    <br>
                    <br>
                    <span style="font-size: 40px; font-weight: bold;">{{ $certificate->heading }}</span>
                    <hr style="width: 100%;text-align: center; border: 1px solid black;">
                </div>
            </center>
            <br>
            <br>
        </div>





        @if($certificate->id == 1)
        <div class="col-lg-12 row" style="font-family: serif; border: 1px solid black;">
            <div class="col-lg-4" style="border-right: 1px solid black;">
                <br>
                <h4><u>BARANGAY OFFICIALS</u></h4>
                <br>
                <h5 style="font-size: 18px;"><b>HON. LUIS F. MAQUILING</b></h5>
                <h4 style="margin-top: -8px; font-weight: normal; font-family: Brush Script MT;">Punong Barangay</h4>
                <br>
                <h5 style="font-size: 18px;"><b>HON. SHERWINE C. BALANSAG</b></h5>
                <h4 style="margin-top: -8px; font-weight: normal; font-family: Brush Script MT;">Chairman on Appropriation Committee</h4>
                <br>
                <h5 style="font-size: 18px;"><b>HON. ROGELIO C. BETONIO</b></h5>
                <h4 style="margin-top: -8px; font-weight: normal; font-family: Brush Script MT;">Chairman on Agriculture Committee</h4>
                <br>
                <h5 style="font-size: 18px;"><b>HON. JUNELITO P. ORILLANEDA</b></h5>
                <h4 style="margin-top: -8px; font-weight: normal; font-family: Brush Script MT;">Chairman on health Committee</h4>
                <br>
                <h5 style="font-size: 18px;"><b>HON. ROBIN O. MARATAS</b></h5>
                <h4 style="margin-top: -8px; font-weight: normal; font-family: Brush Script MT;">Chairman on Peace and Order Committee</h4>
                <br>
                <h5 style="font-size: 18px;"><b>HON. CALVIN L. AJOS JR.</b></h5>
                <h4 style="margin-top: -8px; font-weight: normal; font-family: Brush Script MT;">Chairman Legal Matters Committee</h4>
                <br>
                <h5 style="font-size: 18px;"><b>HON. REA JEAN B. DAPAR</b></h5>
                <h4 style="margin-top: -8px; font-weight: normal; font-family: Brush Script MT;">Chairman on Committee on Education</h4>
                <br>
                <h5 style="font-size: 18px;"><b>HON. SHARIE MAE L. ACOSTA</b></h5>
                <h4 style="margin-top: -8px; font-weight: normal; font-family: Brush Script MT;">Sk-Chairman</h4>
                <br>
                <h5 style="font-size: 18px;"><b>ANNA MERCY L. DALOG-DOG</b></h5>
                <h4 style="margin-top: -8px; font-weight: normal; font-family: Brush Script MT;">Barangay Secretary</h4>
                <br>
                <h5 style="font-size: 18px;"><b>MARINA B. AZARCON</b></h5>
                <h4 style="margin-top: -8px; font-weight: normal; font-family: Brush Script MT;">Barangay Treasurer</h4>
                <br>
            </div>
            <div class="col-lg-8" style="font-family: serif;">
                <br>
                <center><span style="font-size: 55px; font-family: 'Monotype Corsiva'; font-weight: bold;padding-bottom: 1px; border-bottom: 2px solid black;">{{ Str::upper($certificate->description) }}</span></center>
                <br>
                <br>
                <br>
                <div><span style="font-size: 18px;">To Whome It May Concern:</span></div>
                <br>
                <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i data-feather="edit" data-toggle="modal" data-target="#editbtnFirstParagraphBtn" id="editbtnFirstParagraph" style="cursor: pointer; width: 15px;"></i>&nbsp;&nbsp;<span style="font-size: 18px; font-weight: normal;">THIS IS TO CERTIFY that <u><b>CLAIRE F. MARTINEZ</b></u>&nbsp;&nbsp;<i data-feather="edit" data-toggle="modal" data-target="#editbtnFirstParagraphBtn" id="editbtnFirstParagraph" style="cursor: pointer; width: 15px;"></i> legal age, Filipino citizen and a bonafide resident of Purok Mariposa, Barangay Bag-ong Lungsod, Tandag City, Surigao del Sur, he is a indigent and no fixed income.</span></div>
                <br>
                <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-size: 18px; font-weight: normal;">This certification is being issued upon the request of interested party for <u><b>PHILHEALTH PURPOSES</b></u>.</span></div>
                <br>
                <?php 
                function ordinal($number) {
                    $ends = array('th','st','nd','rd','th','th','th','th','th','th');
                    if ((($number % 100) >= 11) && (($number%100) <= 13))
                        return $number. 'th';
                    else
                        return $number. $ends[$number % 10];
                }
                ?>
                <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-size: 18px; font-weight: normal;">ISSUED this <u><b><?php echo ordinal(20); ?> day</b></u> of <u><b>January, 2023,</b></u> at Barangay Hall of Bag-ong Lungsod, Tandag City, Surigao del Sur.</h5></div>
                <br><br><br>
                <div class="float-right">
                    <h4 class="mt-2"><b>HON. LUIS F. MAQUILING</b></h4>
                    <center><h5 class="ml-5">&nbsp Punong Barangay</h5></center>
                </div>
                <br><br><br>
                <div class="float-left">
                    <h4><b>Not Valid without seal</b></h4>
                </div>
            </div>
        </div>
        @elseif($certificate->id == 2)



        

        @endif



                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




@include('user.certificate.modal.firsteditmodal')
{{-- @include('Reports.SalaryAdjustment.add-onsMagnaCarta.salaryadjustmentmodalSecond') --}}
{{-- @include('Reports.SalaryAdjustment.add-onsMagnaCarta.salaryadjustmentmodalThird') --}}
{{-- @include('Reports.SalaryAdjustment.add-onsMagnaCarta.salaryadjustmentmodalFourth') --}}
    @push('page-scripts')
        <script src="{{ asset('/assets/js/custom.js') }}"></script>
    @endpush
@endsection
