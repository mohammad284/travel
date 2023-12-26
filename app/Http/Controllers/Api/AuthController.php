<?php

namespace App\Http\Controllers\Api;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Http\Request;
    use Illuminate\Routing\Controller;
    use Illuminate\Support\Facades\Auth;
    use App\Models\User;
    use App\Models\ProviderImage;
    use App\Models\Notification;
    use Validator;
    use Image;
class AuthController extends Controller
{
    
    public function __construct() {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    public function register(Request $request){
        
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
            'status'        => '0',
            'type'          => $request->type,
            'main_address'  => $request->main_address,
            'gender'        => $request->gender,
            'age'           => $request->age,
            'bio'           => $request->bio,
            'image'         => $data['image']
        ]);
        return response()->json([
            'message' => 'User successfully registered',
            'user' => $user
        ], 200);
    }
    
    public function login(Request $request){
        $credentials = request(['email', 'password']);
        $token = auth()->guard('api')->attempt($credentials);
        if (!$token) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        return $this->respondWithToken($token);
    }

    protected function respondWithToken($token){
    
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 20,
            'user' => auth('api')->user()
        ]);
    }  

    public function refresh() {
        return $this->createNewToken(auth()->refresh());
    }

    public function logout(){
        auth()->logout();

        return response()->json(['message' => 'logout successfully']);
    }
}
