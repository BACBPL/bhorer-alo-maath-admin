<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ServiceProvider;
use App\Models\Skill;

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
    'city',
    'pincode',
    'provider_type',
    'experience',
    'address',
    'status',
    'current_pincode',
    'service_radius',
    'serviceable_pincodes',

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
}