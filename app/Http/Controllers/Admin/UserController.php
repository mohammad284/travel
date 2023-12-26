<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function allUser(){
        $users = User::where('type','user')->get();
        return view('dashboard.user.users',compact('users'));
    }
    public function providers(){
        $companies = User::where('type','provider')->where('status','1')->get();
        return view('dashboard.company.companies',compact('companies'));
    }
    public function requestProviders(){
        $companies = User::where('type','provider')->where('status','0')->get();
        return view('dashboard.company.companies-request',compact('companies'));
    }
    public function acceptProvider($com_id){
        $company = User::find($com_id)->update(['status'=>'1']);
        return redirect()->back()->with('message','accepted successfully');
    }
    public function blockProvider($com_id){
        $company = User::find($com_id)->update(['status'=>'2']);
        return redirect()->back()->with('message','accepted successfully');
    }
    public function blocked(){
        $companies = User::where('type','provider')->where('status','2')->get();
        return view('dashboard.company.companies-blocked',compact('companies'));
    }
}
