<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\TripeLine;
use App\Models\City;
use App\Models\User;

class TripController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function allTrips(){
        $admin = Auth::guard('admin')->check();
        if($admin = true){
            $trips = TripeLine::with('company','from_city','to_city')->get();
        }else{

        }
        $cities = City::all();
        $providers = User::where('type','provider')->where('status','1')->get();
        return view('dashboard.trip.trips',compact('trips','cities','providers'));
    }
    public function storeTrip(Request $request){
        $data = [
            'provider_id' => $request->provider_id,
            'from'        => $request->from,
            'to'          => $request->to,
            'time'        => $request->time,
            'price'       => $request->price,
            'total_sit'   => $request->total_sit,
            'free_sit'    => $request->total_sit,
            'vip'         => $request->vip,
            'day'         => $request->day
        ];
        TripeLine::create($data);
        return redirect()->back()->with('message','added successfully');

    }
    public function updateTrip(Request $request){
        $trip = TripeLine::find($request->trip_id);
        $data = [
            'provider_id' => $request->provider_id,
            'from'        => $request->from,
            'to'          => $request->to,
            'time'        => $request->time,
            'price'       => $request->price,
            'total_sit'   => $request->total_sit,
            'vip'         => $request->vip,
            'day'         => $request->day
        ];
        $trip->update($data);
        return redirect()->back()->with('message','updated successfully');
    }
    public function deleteTrip(Request $request){
        $trip = TripeLine::find($request->trip_id)->delete();
        return redirect()->back()->with('message','deleted successfully');
    }
}
