<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Customer extends Authenticatable
{
    //
    use HasApiTokens, HasApiTokens, Notifiable;
    protected $table = 'customers';
    
    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = [

    'firstname',
    'lastname',
    'email',
    'profile_image',
    'mobile',
    'alternative_mobile',
    'address',
    'house_no',
    'street_name',
    'pincode',
    'city',
    'state',
    'otp',
    'email_verified',
    'account_status',
    'status',
];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    
}
