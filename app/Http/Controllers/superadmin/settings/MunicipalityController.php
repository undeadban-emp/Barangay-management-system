<?php

namespace App\Http\Controllers\superadmin\settings;

use App\Models\Municipality;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
class MunicipalityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lastIds = Municipality::get();
        if($lastIds != null){
            $lastId = DB::table('municipalities')->latest('id')->first();
        }
        return view('superadmin.settings.municipality.index', compact('lastId'));
    }

    public function list(Request $request)
    {

        if ($request->ajax()) {
            $data = Municipality::select('id', 'description')->get();
            return DataTables::of($data)
                ->addColumn('action', function ($row) {
                    $btn = "<button id='btnEdit' value='$row' class=' text-white edit btn btn-primary  ml-2 btnEdit' >Edit<i class='las la-trash'></i></button>";
                    $btn .= "<button class='text-white edit btn btn-danger ml-2 btnDelete' value='$row->id'>Delete<i class='las la-trash'></i></button>";
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
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
            'municipalityName' => 'required',
        ]);
        $user = new Municipality();
        $user->description = request()->municipalityName;
        $user->save();
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
        $data = Municipality::find($id);
        $data->description = request()->municipalityName;
        $data->save();
        return response()->json(['success' => true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Municipality::find($id);
        $delete->delete();
        return response()->json(['success' => true]);
    }
}