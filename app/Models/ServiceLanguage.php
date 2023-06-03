<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceLanguage extends Model
{
    use HasFactory;

    protected $table = 'service_languages';

    protected $fillable = [
        'message_place_id',
        'language'
    ];

    public $timestamps = false;

    public function massagePlace()
    {
        return $this->belongsTo(MassagePlace::class, 'message_place_id', 'id');
    }
}
