<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function addReview(Request $request){
        $review = new Review;
        $review->comment = $request->comment;
        $review->rate = $request->rate;
        $review->user_id = $request->user_id;
        $review->company_id = $request->company_id;
        $review->status = '0';
        $review->save();
        return response()->json([
            'details' => 'added successfully'
        ]);
    }
}
