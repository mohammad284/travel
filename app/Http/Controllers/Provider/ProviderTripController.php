<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\TripeLine;
use App\Models\City;
use App\Models\User;
class ProviderTripController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:provider');
    }
    public function myTrips(){
        $provider = Auth::user();
        if($provider->type == 'manager'){
            $provider = User::find($provider->company_id);
        }
        $trips = TripeLine::with('from_city','to_city')->where('provider_id',$provider->id)->get();
        $cities = City::all();
        return view('provider.my-trips.trips',compact('trips','cities'));
    }
    public function storeProviderTrip(Request $request){
        $provider_id = Auth::user()->id;
        $data = [
            'provider_id' => $provider_id,
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
        $provider_id = Auth::user()->id;
        $trip = TripeLine::find($request->trip_id);
        $data = [
            'provider_id' => $provider_id,
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

    public function tripsPrice(){
        $provider = Auth::user();
        $trips = TripeLine::with('from_city','to_city')->where('provider_id',$provider->id)->get();
        // dd($trips);
        return view('provider.my-trips.price-adjustment',compact('trips'));
    }

}