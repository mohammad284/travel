<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = [
        'provider_id',
        'user_id',
        'total_name',
        'identification_number',
        'num_sit',
        'total_price',
        'trip_id',
        'date',
        'from_city',
        'to_city'
    ];
    public function company()
    {
        return $this->belongsto('App\Models\User', 'provider_id', 'id');
    }
    public function trip()
    {
        return $this->belongsto('App\Models\TripeLine', 'trip_id', 'id');
    }
    public function user()
    {
        return $this->belongsto('App\Models\User', 'user_id', 'id');
    }
}
