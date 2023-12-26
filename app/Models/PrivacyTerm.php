<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrivacyTerm extends Model
{
    use HasFactory;
    protected $fillable = [
        'privacy_en',
        'privacy_ar',
        'term_en',
        'term_ar',
    ];
}
