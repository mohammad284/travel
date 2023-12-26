<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\TripeLine;
use App\Models\User;
use App\Models\AboutUs;
use Carbon\Carbon;
use Datatables;
use Illuminate\Support\Facades\Auth;
class ProviderReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:provider');
    }
    public function Reports(){
        $provider = Auth::user();
        $trips = TripeLine::with('from_city','to_city')
        ->where('provider_id','1')
        ->get();
        $details = [];
        foreach($trips as $trip){
            $count = Booking::where('trip_id',$trip->id)->sum('total_price');
            $sits = Booking::where('trip_id',$trip->id)->sum('num_sit');
            $final = array('trip_details'=>$trip , 'total'=>$count,'sits' => $sits);
            array_push($details , $final);
        }
        // return $details;
        return view('provider.report.reports',compact('details'));
    }
    public function detailsReport(Request $request){
        $trip_id = $request->trip_id;
        $bookings = Booking::with('user')->where('trip_id',$request->trip_id)->get();
        return view('provider.report.details',compact('bookings','trip_id'));
    }
    public function filterReport(Request $request){
        $trip_id = $request->trip_id;
        $bookings = Booking::with('user')
        ->where('trip_id',$request->trip_id)
        ->whereBetween('date', [$request->from , $request->to])
        ->get();
        return view('provider.report.details',compact('bookings','trip_id'));
    }

}
