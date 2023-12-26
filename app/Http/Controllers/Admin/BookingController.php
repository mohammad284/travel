<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\TripeLine;
use App\Models\User;
use Carbon\Carbon;
class BookingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function newCompanyBooking(){
        $companies = User::withCount('trips')->where('type','provider')->where('status','1')->get();
        return view('dashboard.booking.new-company-booking',compact('companies'));
    }
    public function companyBookingDetails($company_id){
        $data_array = [];
        for( $i = 0; $i <7 ; $i++){
            $date  = now()->addDay($i)->format('Y-m-d:l');
            if(now()->addDay($i)->format('l') == 'Friday'){
            }else{
                $day = now()->addDay($i)->format('l');
                if($day == 'Satarday')  {$day = '0';}
                if($day == 'Sunday')    {$day = '1';}
                if($day == 'Monday')    {$day = '2';}
                if($day == 'Tuesday')   {$day = '3';}
                if($day == 'Wednesday') {$day = '4';}
                if($day == 'Thursday')  {$day = '5';}
                $trips = TripeLine::with('from_city','to_city')->where('provider_id',$company_id)->where('day',$day)->get();
                $final = array('date' => $date , 'trips'=>$trips);
                array_push($data_array ,$final);
            }
        }
        // dd($data_array);
        return view('dashboard.booking.company-trip',compact('data_array'));
    }
    public function tripDetails(Request $request){
        $day = now();
        $all_booking = Booking::with('user','trip.from_city','trip.to_city')
        ->where('trip_id',$request->trip_id)
        ->where('date','>=',$day)
        ->get();
        return view('dashboard.booking.trip-details',compact('all_booking'));
    }
    public function oldCompanyBooking(){
        $companies = User::withCount('trips')->where('type','provider')->where('status','1')->get();
        return view('dashboard.booking.old-company-booking',compact('companies'));
    }
    public function oldCompanyBookingDetails($company_id){
        $bookings = booking::with('trip','user')
        ->where('provider_id',$company_id)
        ->whereDate('date','<',Carbon::today())
        ->get();
        return view('dashboard.booking.old-booking',compact('bookings'));
    }
}
