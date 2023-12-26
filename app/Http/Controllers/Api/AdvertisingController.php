<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Advertising;

class AdvertisingController extends Controller
{
    public function advertising(){
        $all_advertising = Advertising::where('status','1')->get();
        return response()->json([
            'details' => $all_advertising
        ]);
    }
}
