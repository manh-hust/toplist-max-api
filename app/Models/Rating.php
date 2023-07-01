<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    protected $table = 'ratings';

    protected $fillable = [
        'massage_place_id',
        'nickname',
        'email_address',
        'point',
        'content',
    ];

    public function massagePlace()
    {
        return $this->belongsTo(MassagePlace::class);
    }
}
