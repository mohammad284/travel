<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TripeLine extends Model
{
    use HasFactory;
    protected $fillable = [
        'provider_id',
        'from',
        'to',
        'time',
        'price',
        'free_sit',
        'total_sit',
        'vip',
        'day'// 0:saturday , 1:sunday , 2:monday,3:Tuesday ,4:wednesday,5:Thursday,
    ];

    public function company()
    {
        return $this->belongsTo('App\Models\User', 'provider_id', 'id');
    }
    public function from_city()
    {
        return $this->belongsTo('App\Models\City', 'from', 'id');
    }
    public function to_city()
    {
        return $this->belongsTo('App\Models\City', 'to', 'id');
    }
    public function bookings()
    {
        return $this->hasMany('App\Models\Booking', 'trip_id', 'id');
    }

}
