<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;
class CityController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function allCity(){
        if(request()->ajax()) {
        return datatables()->of(City::select('*'))
        ->addColumn('action', 'companies.action')
        ->rawColumns(['action'])
        ->addIndexColumn()
        ->make(true);
        }
        return view('dashboard.city.cities');

        $cities = City::all();
        return view('dashboard.city.cities',compact('cities'));
    }
    public function deleteCity(Request $request){
        $city = City::find($request->city_id)->delete();
        return redirect()->back()->with('message','deleted city successfully');
    }
    public function storeCity(Request $request){
        $city = new City;
        $city->name = $request->name;
        $city->save();
        return response()->json(['success'=>'Added new records.']);
    }
    public function updateCity(Request $request,$city_id){
        $city = City::find($city_id);
        $city->name = $request->name;
        $city->save();
        return redirect()->back()->with('message','updated successfully');
    }
}
