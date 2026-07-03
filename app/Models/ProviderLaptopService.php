<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProviderLaptopService extends Model
{
    protected $table = 'provider_laptop_services';

    protected $fillable = [
        'provider_id',
        'laptop_service_id'
    ];

    public function provider()
    {
        return $this->belongsTo(ServiceProvider::class, 'provider_id');
    }

    public function laptopService()
    {
        return $this->belongsTo(LaptopService::class, 'laptop_service_id');
    }
}