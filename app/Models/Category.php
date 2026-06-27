<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'category_name',
        'status'
    ];

    public function subCategories()
    {
        return $this->hasMany(SubCategory::class, 'category_id');
    }

    public function services()
    {
        return $this->hasMany(Service::class, 'category_id');
    }
}