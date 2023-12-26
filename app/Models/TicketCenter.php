<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketCenter extends Model
{
    use HasFactory;
    protected $fillable = [
        'provider_id',
        'city_id',
        'address'
    ];
    public function city()
    {
        return $this->belongsTo('App\Models\City', 'city_id', 'id');
    }
    public function center_company()
    {
        return $this->belongsTo('App\Models\User', 'provider_id', 'id');
    }
}
