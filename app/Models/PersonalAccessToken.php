<?php
namespace App\Models;

use Laravel\Sanctum\PersonalAccessToken as SanctumPersonalAccessToken;

class PersonalAccessToken extends SanctumPersonalAccessToken
{
    /**
     * The table associated with the model.
     */
    protected $table = 'personal_access_tokens';

    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'abilities' => 'json',
        'last_used_at' => 'datetime',
        'expires_at' => 'datetime',
    ];

    /**
     * Get the tokenable model (Customer).
     */
    public function tokenable()
    {
        return $this->morphTo('tokenable');
    }
}