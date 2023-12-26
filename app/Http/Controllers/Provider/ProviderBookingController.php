<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\TripeLine;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
class ProviderBookingController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:provider');
    }
    public function myNewBooking(){
        $provider = Auth::user();
        if($provider->type == 'manager'){
            $provider = User::find($provider->company_id);
            $manager = Auth::user();
            $data_array = [];
            for( $i = 0; $i <7 ; $i++){
                $date  = now()->addDay($i)->format('Y-m-d:l');
                if(now()->addDay($i)->format('l') == 'Friday'){
                }else{
                    $day = now()->addDay($i)->format('l');
                    $trips = TripeLine::with('from_city','to_city')
                    ->where('provider_id',$provider->id)
                    ->where('day',$day)
                    ->where('from',$manager->city_id)
                    ->get();
                    $final = array('date' => $date , 'trips'=>$trips);
                    array_push($data_array ,$final);
                }
            }
            return view('provider.booking.my-trip',compact('data_array'));
        }
        $data_array = [];
        for( $i = 0; $i <7 ; $i++){
            $date  = now()->addDay($i)->format('Y-m-d:l');
            if(now()->addDay($i)->format('l') == 'Friday'){
            }else{
                $day = now()->addDay($i)->format('l');
                $trips = TripeLine::with('from_city','to_city')->where('provider_id',$provider->id)->where('day',$day)->get();
                $final = array('date' => $date , 'trips'=>$trips);
                array_push($data_array ,$final);
            }
        }
        // dd($data_array);
        return view('provider.booking.my-trip',compact('data_array'));
    }
    public function tripDetails(Request $request){
        $day = now();
        $all_booking = Booking::with('user','trip.from_city','trip.to_city')
        ->where('trip_id',$request->trip_id)
        ->where('date','>=',$day)
        ->get();
        // dd($all_booking);
        return view('provider.booking.trip-details',compact('all_booking'));
    }
    public function myOldBooking(){
        $provider = Auth::user();
        if($provider->type == 'manager'){
            $provider = User::find($provider->company_id);
        }
        $bookings = booking::with('trip','user')
        ->where('provider_id',$provider->id)
        ->whereDate('date','<',Carbon::today())
        ->get();
        return view('provider.booking.old-booking',compact('bookings'));
    }
} 
