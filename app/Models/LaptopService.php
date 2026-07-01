<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\LaptopServiceCategory;

class LaptopService extends Model
{
    protected $fillable = [
        'laptop_service_category_id',
        'service_type',
        'service_name',
        'description',
        'price',
        'image',
        'status',
        'is_featured'
    ];

    public function laptopServiceCategory()
    {
        return $this->belongsTo(LaptopServiceCategory::class, 'laptop_service_category_id');
    }

    public function laptopBrand()
    {
        return $this->belongsTo(LaptopBrand::class, 'laptop_brand_id');
    }

    public function laptopModel()
    {
        return $this->belongsTo(LaptopModel::class, 'laptop_model_id');
    }
}