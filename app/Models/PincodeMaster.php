<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PincodeMaster extends Model
{
    protected $table = 'pincode_masters';

    protected $fillable = [
        'pincode',
        'branch_city',
        'oda',
        'origin_region',
        'metro_present',
        'zone_name',
        'status',
        'state',
        'state_code',
        'zone'
    ];

    public $timestamps = false;
}