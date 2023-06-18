<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Masseuse extends Model
{
    use HasFactory;

    protected $table = 'masseuses';

    protected $fillable = [
        'name',
        'age',
        'image',
        'experience',
        'service',
        'massage_place_id',
    ];

    public $timestamps = false;

    public function massagePlace()
    {
        return $this->belongsTo(MassagePlace::class);
    }

    public function masseuseServiceLanguages()
    {
        return $this->hasMany(MasseuseServiceLanguage::class, 'masseuse_id', 'id');
    }
}
