<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';

    protected $fillable = [
        'massage_place_id',
        'nickname',
        'email_address',
        'content',
    ];


    public function massagePlace()
    {
        return $this->belongsTo(MassagePlace::class, 'massage_place_id', 'id');
    }
    
}