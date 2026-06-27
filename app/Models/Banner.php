<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = [
        'name',
        'file_url',
        'file_path',
        'location',
        'type',
        'status',
    ];
}