<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasseuseServiceLanguage extends Model
{
    use HasFactory;

    protected $table = 'masseuse_service_languages';

    protected $fillable = [
        'masseuse_id',
        'language',
    ];

    public $timestamps = false;

    public function masseuse()
    {
        return $this->belongsTo(Masseuse::class, 'masseuse_id', 'id');
    }
}
