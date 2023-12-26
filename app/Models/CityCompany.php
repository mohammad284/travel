<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CityCompany extends Model
{
    use HasFactory;
    protected $fillable = [
        'city_id',
        'provider_id'
    ];
}
