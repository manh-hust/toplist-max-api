<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $table = 'reports';

    protected $fillable = [
        'nickname',
        'email_address',
        'content',
        'massage_place_id',
    ];

    public function massagePlace()
    {
        return $this->belongsTo(MassagePlace::class);
    }
}
