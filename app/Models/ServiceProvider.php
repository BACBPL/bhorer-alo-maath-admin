<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ServiceProvider;
use App\Models\Skill;
use App\Models\LaptopService;

class ServiceProvider extends Model
{
    protected $table = 'service_providers';

    protected $fillable = [

    'branch_id',
    'engineer_code',
    'name',
    'email',
    'logo',
    'mobile',
    'password',
    'age',

    'state',
    'city',
    'current_pincode',
    'service_radius',
    'serviceable_pincodes',

    'provider_type',
    'experience',
    'address',

    'aadhaar_number',
    'aadhaar_card',

    'pan_number',
    'pan_card',

    'driving_license_number',
    'driving_license',

    'profile_photo',

    'bank_name',
    'account_holder_name',
    'account_number',
    'ifsc_code',
    'bank_document',

    'status'

];

    public function providerServices()
    {
        return $this->hasMany(ProviderService::class, 'provider_id');
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'provider_id');
    }

 public function skills()
{
    return $this->belongsToMany(
        Skill::class,
        'provider_skills',
        'provider_id',
        'skill_id'
    );
}

    public function laptopServices()
    {
        return $this->belongsToMany(
            LaptopService::class,
            'provider_laptop_services',
            'provider_id',
            'laptop_service_id'
        );
    }
}