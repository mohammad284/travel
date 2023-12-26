<?php

namespace App\Http\Controllers\Provider;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking;
use App\Models\User;
use App\Models\City;
use App\Models\TripeLine;
use App\Models\TicketCenter;

class ProviderController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:provider');
    }
    public function index(){
        $provider_id = Auth::user()->id;
        $week_days = [];
        $week_booking = [];
        for( $i = 0; $i <7 ; $i++){
            $day  = now()->subDays($i)->format('Y-m-d:l');
            if(now()->subDays($i)->format('l') == 'Friday'){
            }else{
                $days  = now()->subDays($i)->format('l');
                array_push($week_days , $days);
                $booking_count  = Booking::where('provider_id',$provider_id)->where('date',$day)->count();
                array_push($week_booking , $booking_count);
            }            
        }
        $last_week_days = [];
        $last_week_booking = [];
        for( $i = 7; $i <14 ; $i++){
            $day  = now()->subDays($i)->format('Y-m-d:l');
            if(now()->subDays($i)->format('l') == 'Friday'){
            }else{
                $days  = now()->subDays($i)->format('l');
                array_push($last_week_days , $days);
                $booking_count  = Booking::where('provider_id',$provider_id)->where('date',$day)->count();
                array_push($last_week_booking , $booking_count);
            }            
        }
        $cities = City::all();
        $city_name = [];
        $city_count = [];
        foreach($cities as $city){
            $booking_count  = Booking::where('provider_id',$provider_id)->where('from_city',$city->id)->count();
            array_push($city_name,$city->name);
            array_push($city_count,$booking_count);
        }
        $date = now();
        $to = now()->addDays(14);
        $trips  = TripeLine::where('provider_id',$provider_id)->count();
        $old_bookings = Booking::where('provider_id',$provider_id)
        ->whereBetween('date', ['2022-10-1', $date])
        ->count();
        $new_bookings = Booking::where('provider_id',$provider_id)
        ->whereBetween('date', [$date, $to])
        ->count();
        $centers  = TicketCenter::where('provider_id',$provider_id)->count();
        return view('provider.index',compact('week_days','week_booking','last_week_days','last_week_booking','city_name','city_count','centers','old_bookings','new_bookings','trips'));
    }
    public function myProfile(){
        $provider = Auth::user();
        dd($provider);
    }
}
