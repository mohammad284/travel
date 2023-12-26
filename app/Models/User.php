<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $guard = "provider";
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'mobile',
        'password',
        'status',
        'type',
        'main_address',
        'image',
        'gender',//1:male , 2: female ,3 :other
        'age',
        'bio',
        'city_id',
        'company_id'
    ];
    
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public function trips()
    {
        return $this->hasMany('App\Models\TripeLine', 'provider_id', 'id');
    }
    public function center_company()
    {
        return $this->hasMany('App\Models\TicketCenter', 'provider_id', 'id');
    }
    public function city_manager()
    {
        return $this->belongsTo('App\Models\City', 'city_id', 'id');
    }
}
