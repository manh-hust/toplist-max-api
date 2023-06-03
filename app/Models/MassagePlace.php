<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MassagePlace extends Model
{
    use HasFactory;

    protected $table = 'massage_places';

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
    ];

    public function serviceLanguages()
    {
        return $this->hasMany(ServiceLanguage::class, 'message_place_id', 'id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'massage_place_id', 'id');
    }
}