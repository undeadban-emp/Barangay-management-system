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

        $houseHoldDataArray = explode('|', $request->houseHoldData);
        $houseHold = Household::create([
            'region' => Auth::user()->region_id,
            'province' => Auth::user()->province_id,
            'municipality' => Auth::user()->municipality_id,
            'barangay' => Auth::user()->barangay_id,
            'house_hold_no' => $houseHoldDataArray[0],
            'purok' => $houseHoldDataArray[1],
            'zone' => $houseHoldDataArray[2],
        ]);
        $lengthAddedInRowArray = explode('~~', $request->residentdata);
        foreach($lengthAddedInRowArray as $lengthAddedInRowArrays){
            $residentAddedRowStore = explode('|', $lengthAddedInRowArrays);
            Person::create([
                'house_hold_no' => $houseHold->id,
                'isHead' => $residentAddedRowStore[4],
                'firstname' => $residentAddedRowStore[0],
                'middlename' => $residentAddedRowStore[1],
                'lastname' => $residentAddedRowStore[2],
                'suffix' => $residentAddedRowStore[3],
                'birth_date' => $residentAddedRowStore[5],
                'birth_place' => $residentAddedRowStore[6],
                'sex' => $residentAddedRowStore[7],
                'civil_status' => $residentAddedRowStore[8],
                'citizenship' => $residentAddedRowStore[9],
            ]);
        }
        return response()->json(['success' => true]);
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