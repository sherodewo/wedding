<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Kebaya extends Authenticatable
{

    protected $fillable = [
        'name', 'image',
    ];

    protected $dates = ['deleted_at'];

}
