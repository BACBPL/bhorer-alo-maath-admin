<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LaptopBrand extends Model
{
    protected $fillable = [
        'brand_name',
        'description',
        'status'
    ];

    public function models()
    {
        return $this->hasMany(
            LaptopModel::class,
            'laptop_brand_id'
        );
    }
}