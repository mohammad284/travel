<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    public function companies(){
        $companies = User::where('type','provider')->where('status','1')->get();
        return response()->json([
            'details' => $companies
        ]);
    }
}
