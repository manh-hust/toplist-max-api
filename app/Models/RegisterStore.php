<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegisterStore extends Model
{
    use HasFactory;

    protected $table = 'register_stores';

    protected $fillable = [
        'name',
        'area',
        'address',
        'rate',
        'service',
        'review_content',
        'phone_number',
        'advantage',
        'status',
        'max_price',
        'min_price',
        'photo_url'
    ];
}
