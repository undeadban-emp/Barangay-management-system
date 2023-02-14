<?php

namespace App\Http\Controllers\superadmin\account;

use App\Models\User;
use App\Models\Region;
use App\Models\Barangay;
use App\Models\Province;
use App\Models\Municipality;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $region = Region::get();
        $province = Province::get();
        $municipality = Municipality::get();
        $barangay = Barangay::get();
        return view('superadmin.account.users.index', compact('region','province','municipality','barangay'));
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
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
            'firstname' => 'required',
            'middlename' => 'required',
            'lastname' => 'required',
            'account_level' => 'required',
            'role' => 'required',
            'region' => 'required',
            'province' => 'required',
            'municipality' => 'required',
            'barangay' => 'required',
        ]);
        $user = new User();
        $user->username = $request['username'];
        $user->password = Hash::make($request['password']);
        $user->firstname = $request['firstname'];
        $user->middlename = $request['middlename'];
        $user->lastname = $request['lastname'];
        $user->role = $request['role'];
        $user->account_level = $request['account_level'];
        $user->region = $request['region'];
        $user->province = $request['province'];
        $user->municipality = $request['municipality'];
        $user->barangay = $request['barangay'];
        $user->save();
        return back()->with('message', 'success');
    }

    public function list(Request $request)
    {

        if ($request->ajax()) {
            $data = User::with('barangays')->where('role', 0)->get();
            return DataTables::of($data)
                ->addColumn('action', function ($row) {
                    $btn = "<button id='btnEdit' value='$row' class=' text-white edit btn btn-primary  ml-2 btnEdit' >Edit<i class='las la-trash'></i></button>";
                    $btn .= "<button class='text-white edit btn btn-danger ml-2 btnDelete' value='$row->id'>Delete<i class='las la-trash'></i></button>";
                    return $btn;
                })
                ->addColumn('barangay', function ($row) {
                    return $row->barangays->description;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
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