<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
    'category_id',
    'sub_category_id',
    'item_name',
    'status',
];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class,'sub_category_id');
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}