<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'provider_id',
        'notification',
        'is_read'
    ];
    public function user()
    {
        return $this->belongsto('App\Models\User', 'user_id', 'id');
    }
}
