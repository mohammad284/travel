<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\City;
use App\Models\TicketCenter;

class ProviderTicketCentersController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:provider');
    }
    public function ticketCenters(){
        $provider = Auth::user();
        if($provider->type == 'manager'){
            $provider = User::find($provider->company_id);
        }
        $centers = TicketCenter::where('provider_id',$provider->id)->get();
        $cities = City::all();
        return view('provider.ticket-center.centers',compact('centers','cities'));
    }
    public function addCenter(Request $request){
        $provider = Auth::user();
        if($provider->type == 'manager'){
            $provider = User::find($provider->company_id);
        }
        $data = [
            'provider_id' => $provider->id,
            'city_id'     => $request->city_id,
            'address'     => $request->address,
        ];
        TicketCenter::create($data);
        return redirect()->back()->with('message','added saccessfully');
    }
    public function updateCenter(Request $request){
        $center = TicketCenter::find($request->center_id);
        $center->city_id = $request->city_id;
        $center->address = $request->address;
        $center->save();
        return redirect()->back()->with('message','updated saccessfully');
    }
    public function deleteCenter(Request $request){
        $center = TicketCenter::find($request->center_id)->delete();
        return redirect()->back()->with('message','deleted saccessfully');
    }
}
