<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $fillable = [
        'comment',
        'rate',
        'user_id',
        'company_id',
        'status' // 0:off , 1:on
    ];
}
