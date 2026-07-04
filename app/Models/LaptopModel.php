<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\LaptopServiceCategory;

class LaptopModel extends Model
{
    protected $fillable = [

        'laptop_service_category_id',

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

    public function category()
    {
        return $this->belongsTo(
            LaptopServiceCategory::class,
            'laptop_service_category_id'
        );
    }
}