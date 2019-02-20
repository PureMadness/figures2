<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;

class User extends Model implements AuthenticatableContract
{
    use Authenticatable;

    protected $table = 'users';

    public $timestamps = false;

    protected $fillable = [
        'login', 'password'
    ];

    public function figures(){
        return $this->hasMany('App\Models\Figure');
    }
}
