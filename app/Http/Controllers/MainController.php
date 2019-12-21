<?php

namespace App\Http\Controllers;

use App\District;
use App\Division;
use App\Thana;
use Illuminate\Http\Request;

class MainController extends Controller
{
    //

    public function index()
    {
        $divisions = Division::all()->pluck("name","id");
        return view('index',compact('divisions'));
    }

    public function getDistrictList(Request $request)
    {
        $districts = District::all()
            ->where("division_id",$request->division_id)
            ->pluck("name","id");
        return response()->json($districts);
    }

    public function getThanaList(Request $request)
    {
        $thanas = Thana::all()
            ->where("district_id",$request->district_id)
            ->pluck("name","id");
        return response()->json($thanas);
    }


}
