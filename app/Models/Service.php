<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Item;

class Service extends Model
{
    protected $fillable = [
        'category_id',
        'sub_category_id',
        'item_id',
        'service_type',
        'description',
        'price',
        'image',
        'status',
        'is_featured',
        'is_most_booked'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class, 'sub_category_id');
    }

    public function providerServices()
    {
        return $this->hasMany(ProviderService::class, 'service_id');
    }

    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id');
    }
}