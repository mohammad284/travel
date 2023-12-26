<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function reviews(){
        $revirws = Review::where('status','1')->get();
        return view('dashboard.review.reviews',compact('revirws'));
    }
    public function deleteReview($revirw_id){
        $review = Review::find($revirw_id)->delete();
        return redirect()->back()->with('message','deleted review successfully');
    }
    public function changeStatus($rev_id){
        $review = Review::find($rev_id);
        if($review->status == '1'){
            $review->status = '0';
            $review->save();
        }else{
            $review->status = '1';
            $review->save();
        }
        return redirect()->back()->with('message','change review successfully');
    }
}
