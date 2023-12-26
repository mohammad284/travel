<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];
    public function from_trip()
    {
        return $this->hasMany('App\Models\TripeLine', 'from', 'id');
    }
    public function to_trip()
    {
        return $this->hasMany('App\Models\TripeLine', 'to', 'id');
    }
}
