<?php

namespace App\Http\Controllers\Provider;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\City;
use Validator;
use Image;
use Illuminate\Support\Facades\Auth;
class ProviderManagerController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:provider');
    }
    public function managers(){
        $provider = Auth::user();
        $managers = User::where('type','manager')->where('company_id',$provider->id)->get();
        $cities   = City::all();
        return view('provider.manager.all-managers',compact('managers','cities'));
    }
    public function addManager(Request $request){
        $provider = Auth::user();
        $validator = Validator::make($request->all(), [
            'name'         => ['required', 'string', 'max:255'],
            'email'        => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'     => ['required', 'string', 'min:8', 'confirmed'],
            'mobile'       => ['required', 'unique:users'],
            'main_address' => ['required'],
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }
        if ($request['image'] == NUll){
            $data['image'] = 'images/avatar.jpg';
        }
        if($request->file('image')){
            $image=$request->file('image');
            $input['image'] = $image->getClientOriginalName();
            $path = 'images/user/';
            $destinationPath = 'images/user';
            $img = Image::make($image->getRealPath());
            $img->resize(500, 500, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.time().$input['image']);
            $name = $path.time().$input['image'];            
           $data['image'] =  $name;
        }
        $user =  User::create([
            'name'          => $request['name'],
            'email'         => $request['email'],
            'mobile'        => $request['mobile'],
            'password'      => Hash::make($request['password']),
            'status'        => '1',
            'type'          => 'manager',
            'main_address'  => $request->main_address,
            'gender'        => $request->gender,
            'age'           => $request->age,
            'image'         => $data['image'],
            'city_id'       => $request->city_id,
            'company_id'    => $provider->id
        ]);
        return redirect()->back()->with('message','added sucessfully');
    }
    public function updateManager(Request $request){
        $manager = User::find($request->manager_id);
        if ($manager->email != $request->email) {
            $simular_email = User::where('email',$request->email)->get();
            if (count($simular_email) > 0) {
                return redirect()->back()->with('message','email has taken');
            }   
        }
        if($request->password == null){
            $user =  User::create([
                'name'          => $request['name'],
                'email'         => $request['email'],
                'mobile'        => $request['mobile'],
                'main_address'  => $request->main_address,
                'gender'        => $request->gender,
                'age'           => $request->age,
                'city_id'       => $request->city_id,
            ]);
        }else{
            $validator = Validator::make($request->all(), [
                'password'     => ['required', 'string', 'min:8', 'confirmed'],
            ]);
            if($validator->fails()){
                return response()->json($validator->errors()->toJson(), 400);
            }
            $user =  User::create([
                'name'          => $request['name'],
                'email'         => $request['email'],
                'mobile'        => $request['mobile'],
                'password'      => Hash::make($request['password']),
                'main_address'  => $request->main_address,
                'gender'        => $request->gender,
                'age'           => $request->age,
                'city_id'       => $request->city_id,
            ]);
        }
        return redirect()->back()->with('message','updated sucessfully');
    }
    public function deleteManager(Request $request){
        $manager = User::find($request->manager_id)->delete();
        return redirect()->back()->with('message','deleted sucessfully');
    }
}
