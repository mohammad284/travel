<?php

namespace App\Http\Controllers\Api;
    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use App\Models\Booking;
    use App\Models\Notification;
    use App\Models\TripeLine;
    use App\Models\User;
    use Validator;
class BookingController extends Controller
{
    public function bookTrip(Request $request){
        $validator = Validator::make($request->all(), [
            'user_id'    => ['required'],
            'total_name' => ['required'],
            'identification_number' => ['required'],
            'num_sit'    => ['required'],
            'total_price'=> ['required'],
            'trip_id'    => ['required'],
            'date'       => ['required'],
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }
        $trip = TripeLine::find( $request->trip_id);
        $user = User::find($request->user_id);
        if($trip->free_sit == 0){
            return response()->json([
                'details' => 'dont have free sit'
            ]);
        }else{
            if($trip->free_sit >= $request->num_sit ){
                $free_sit = $trip->free_sit - $request->num_sit;
                $trip->free_sit = $free_sit;
                $trip->save();
                $data = [
                    'provider_id'           => $trip->provider_id,
                    'user_id'               => $request->user_id,
                    'total_name'            => $request->total_name,
                    'identification_number' => $request->identification_number,
                    'num_sit'               => $request->num_sit,
                    'total_price'           => $request->total_price,
                    'trip_id'               => $request->trip_id,
                    'date'                  => $request->date,
                    'from_city'             => $trip->from,
                    'to_city'               => $trip->to,
                ];
                Booking::create($data);
                $not = [
                    'provider_id' => $trip->provider_id,
                    'user_id'     => $request->user_id,
                    'notification'=> "new reservation from : $user->name"
                ];
                Notification::create($not);
            }else{
                return response()->json([
                    'details' => 'your sit bigger than trip sit'
                ]);
            }
        }
        return response()->json([
            'details' => 'booking successfully'
        ]);
    }
    public function myBooking(Request $request){
        $booking = Booking::with('company','trip.from_city','trip.to_city')
        ->where('user_id',$request->user_id)
        ->get();
        return response()->json([
            'details' => $booking
        ]);
    }
}