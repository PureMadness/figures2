<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Figure extends Model
{
    use Notifiable;

    protected $table = 'circles';

    public $timestamps = false;

    protected $fillable = [
        'id', 'radius',
    ];

    protected $casts = [
        'data' => 'array'
    ];
}
