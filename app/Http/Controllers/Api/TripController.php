<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\TripeLine;

class TripController extends Controller
{
    public function companyCities(Request $request){
        $cities = TripeLine::with('from_city','to_city')
        ->where('provider_id',$request->company_id)
        ->get();
        return response()->json([
            'details' => $cities
        ]);
    }
    public function companyTrips(Request $request){
        if($request->day != null){
            $trips = TripeLine::where('day',$request->day)
            ->where('from',$request->from)
            ->where('to',$request->to)
            ->where('provider_id',$request->company_id)
            ->get();
        }else{
            $trips = TripeLine::
            where('from',$request->from)
            ->where('to',$request->to)
            ->where('provider_id',$request->company_id)
            ->get();
        }
        return response()->json([
            'details' => $trips
        ]);
    }
    
}
