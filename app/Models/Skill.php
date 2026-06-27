<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $fillable = [
        'skill_name',
        'status'
    ];

    public function providers()
    {
        return $this->belongsToMany(
            ServiceProvider::class,
            'provider_skills',
            'skill_id',
            'provider_id'
        );
    }
}