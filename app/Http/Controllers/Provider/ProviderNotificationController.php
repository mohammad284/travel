<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Notification;
class ProviderNotificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:provider');
    }
    public function notifications(){
        $provider = Auth::user();
        $notifications = Notification::where('provider_id',$provider->id)->get();
        return view('provider.notification.notifications',compact('notifications'));
    }
}
