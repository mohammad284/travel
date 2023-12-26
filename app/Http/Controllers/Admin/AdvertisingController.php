<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Advertising;
use Image;
class AdvertisingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function advertisings(){
        $ads = Advertising::all();
        return view('dashboard.ads.ad',compact('ads'));
    }
    public function storeAd(Request $request){
        // dd($request);
        if($request->file('image')){
            $image=$request->file('image');
            $input['image'] = $image->getClientOriginalName();
            $path = 'images/advertising/';
            $destinationPath = 'images/advertising';
            $img = Image::make($image->getRealPath());
            $img->resize(500, 500, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.time().$input['image']);
            $name = $path.time().$input['image'];
            
            $data['image'] =  $name;
        }
        $data=[
            'image'=> $data['image'],
            'provider_id'=> $request->provider_id,
        ];
        // dd($data);
        Advertising::create($data);
        return redirect()->back()->with('message','added successfully');
    }
    public function deleteAd($ad_id){
        $ad =Advertising::find($ad_id)->delete();
        return redirect()->back()->with('message','deleted successfully');
    }
}
