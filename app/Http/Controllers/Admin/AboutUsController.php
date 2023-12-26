<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutUs;
use App\Models\PrivacyTerm;

class AboutUsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function aboutUs(){
        $about = AboutUs::first();
        return view('dashboard.about.about-us',compact('about'));
    }
    public function updateAboutUs(Request $request){
        $about = AboutUs::first();
        // dd($request);
        $data = [ 
            'email_support' => $request->email_support ,
            'mobile'        => $request->mobile ,
            'phone'         => $request->phone ,
            'faceBook'      => $request->faceBook ,
            'whatsapp'      => $request->whatsapp ,
            'twitter'       => $request->twitter ,
            'Instagram'     => $request->Instagram ,
            'telegram'      => $request->telegram ,
            'en' => [
                'bio' => $request -> bio_en,
            ],
            'ar' => [
                'bio' => $request -> bio_ar,
            ],
        ];
        $about->update($data);
        return redirect()->back()->with('message','updated successfully');
    }
    public function privacy(){
        $data = PrivacyTerm::first();
        return view('dashboard.privacy.privacy',compact('data'));
    }
    public function updatePrivacy(Request $request){
        $privacy = PrivacyTerm::first();
        $data = [ 
            'privacy_en' => $request->privacy_en ,
            'privacy_ar' => $request->privacy_ar ,
            'term_en'    => $request->term_en ,
            'term_ar'    => $request->term_ar ,
        ];
        $privacy->update($data);
        return redirect()->back()->with('message','updated successfully');
    }
}
