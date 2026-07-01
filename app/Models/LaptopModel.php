<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LaptopModel extends Model
{
    protected $fillable = [

        'laptop_brand_id',

        'model_name',

        'description',

        'status'

    ];

    public function brand()
    {
        return $this->belongsTo(
            LaptopBrand::class,
            'laptop_brand_id'
        );
    }
}