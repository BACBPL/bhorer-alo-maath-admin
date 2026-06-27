<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ProviderService;

class ProviderService extends Model
{
    protected $table = 'provider_services';

    protected $fillable = [
        'provider_id',
        'service_id'
    ];

    public function provider()
    {
        return $this->belongsTo(ServiceProvider::class, 'provider_id');
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }
}