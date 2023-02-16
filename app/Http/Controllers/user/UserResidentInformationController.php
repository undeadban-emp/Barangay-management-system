<?php

namespace App\Http\Controllers\user;

use App\Models\Zone;
use App\Models\Purok;
use App\Models\Person;
use App\Models\Household;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserResidentInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('user.resident-information.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $purok = Purok::where('barangay_id', Auth::user()->barangay_id)->get();
        $zone = Zone::get();
        return view('user.resident-information.create', compact('purok', 'zone'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $houseHold = Household::create([
            'region' => Auth::user()->region_id,
            'province' => Auth::user()->province_id,
            'municipality' => Auth::user()->municipality_id,
            'barangay' => Auth::user()->barangay_id,
            'house_hold_no' => $request->householdNo,
            'purok' => $request->purok,
            'zone' => $request->zone,
        ]);
        $data = explode('|', $request->valArray);
        foreach($data as $datas){
            Person::create([
                'house_hold_no' => $houseHold->id,
                'isHead' => $request['familyHead'.$datas],
                'firstname' => $request['firstname'.$datas],
                'middlename' => $request['middlename'.$datas],
                'lastname' => $request['lastname'.$datas],
                'suffix' => $request['suffix'.$datas],
                'birth_date' => $request['birthDate'.$datas],
                'birth_place' => $request['birthPlace'.$datas],
                'sex' => $request['sex'.$datas],
                'civil_status' => $request['civilStatus'.$datas],
                'citizenship' => $request['citizenship'.$datas],
            ]);
        }
        return back()->with('message', 'success');
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
