<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Booking;
use App\Models\TripeLine;
use Illuminate\Support\Facades\Auth;
class ProviderSettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:provider');
    }
}
