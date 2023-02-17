<?php

namespace App\Http\Controllers\User;

use App\Models\Person;
use App\Models\Certificate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class UserCertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $certificate = Certificate::get();
        return view('user.certificate.index', compact('certificate'));
    }

    public function list()
    {
        if (request()->ajax()) {
            $data = Person::with('household')->get();
            return DataTables::of($data)
                // ->addColumn('fullname', function ($row) {
                //     $fullname = "<td>".$row->fullname."</td>";
                //     return $fullname;
                // })
                // ->addColumn('bill_month', function ($row) {
                //     // dd($row->billmonth->price);
                //     if(isset($row->billmonth->price)){
                //         $bill_month = "<td>".number_format($row->billmonth->price, 2, ".", ",")."</td>";
                //     }else{
                //         $bill_month = "<td></td>";
                //     }
                //     return $bill_month;
                // })
                // ->addColumn('status', function ($row) {
                //     if(0 == $row->status){
                //         $status = "<td>Inactive</td>";
                //     }else{
                //         $status = "<td>Active</td>";
                //     }
                //     return $status;
                // })
                // ->addColumn('action', function ($row) {
                //     $btn = "<a title='Edit Customer' href='".url('/admin/customer/edit'.'/'.$row->id)."' class='text-white edit btn btn-success'>Edit</i></a>&nbsp";
                //     $btn .= "<button title='Mark as Delete' class=' text-white edit btn btn-danger  ml-2 delete' value='{$row->id}'>Delete</button>";
                //     return $btn;
                // })
                // ->rawColumns(['action','fullname','status','bill_month'])
                ->make(true);
        }
    }
    
    public function previewedprint(string $type, string $person_status)
    {
        $certificate = Certificate::find($type);
        if($person_status == "1"){

        }else{

        }
        // dd($type.'-----'.$person_status);
        // if($year == 'individual'){
        //     $data = explode("_",$office);
        //     $salaryadjustment_id = $data[0];
        //     $year = $data[1];
        //     $salaryAdjustments = SalaryAdjustment::where('id', $salaryadjustment_id)->whereYear('date_adjustment', $year)->with('Employee')
        //     ->where('ismagnacarta','1')->get();
        //     $office = $salaryadjustment_id.'_'.$year;
        //     $year = 'individual';
        // }else{
        //     if($office == '*'){
        //         $salaryAdjustments = SalaryAdjustment::whereYear('date_adjustment', $year)->with(['Employee' => function ($query) use ($office) {
        //             $query->select('Employee_id','FirstName', 'MiddleName', 'LastName');
        //         }])->limit(1)
        //         ->where('ismagnacarta','1')->get();
        //         $office_name = 'All Offices';
        //         // $salaryAdjustments = Plantilla::whereHas('salary_adjustment', function ($query) use ($year) {
        //         //     $query->whereYear('date_adjustment', $year);
        //         // })->with(['plantilla_positions','Employee', 'salary_adjustment' => function ($query) use ($year) {
        //         //     $query->whereYear('date_adjustment', $year);
        //         // // }])->where('year', $year)->first();
        //         // }])->where('year', $year)->limit(1)->get();
        //     }else{
        //         $salaryAdjustments = SalaryAdjustment::whereYear('date_adjustment', $year)->with(['plantillaPosition','Employee','office' => function ($query) use ($office) {
        //             $query->where('office_code', $office);
        //         }])->where('office_code', $office)
        //         ->where('ismagnacarta','1')
        //             ->get();
        //         // dd($salaryAdjustments[0]->plantillaPosition->position->Description);

        //         // $salaryAdjustments = Plantilla::whereHas('salary_adjustment', function ($query) use ($year) {
        //         //     $query->whereYear('date_adjustment', $year);
        //         // })->with(['plantilla_positions','Employee', 'salary_adjustment' => function ($query) use ($year) {
        //         //     $query->whereYear('date_adjustment', $year);
        //         // }, 'office' => function ($query) use ($office) {
        //         //     $query->where('office_code', $office);
        //         // }])->where('office_code', $office)
        //         //     ->where('year', $year)
        //         //     // ->first();
        //         //     ->get();
        //     }
        // }
        // // $key = 0;
        // $setting = ['Keyvalue1' => file_get_contents(public_path('/storage/Firstparagraph.txt')),'Keyvalue2' => file_get_contents(public_path('/storage/Secondparagraph.txt')),'Keyvalue3' => file_get_contents(public_path('/storage/Thirdparagraph.txt')),'Keyvalue4' => file_get_contents(public_path('/storage/Fourthparagraph.txt'))];
        // // dd($setting);
        // // $setting = Setting::find('SALARYMAGNACARTAPRINT');
        // // return view('reports.SalaryAdjustment.Print.PreviewedIndividual', compact('key','salaryAdjustment','office','year', 'setting'));
        
        return view('user.certificate.previewed', compact('certificate'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
