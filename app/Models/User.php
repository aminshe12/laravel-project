<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * @property string name
 * @property string email
 * @property string password
 * @property string role
 */

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    const ACTIVE    = 1;
    const BLOCK     = 0;

    const statuses  = [
        self::ACTIVE        => "Active",
        self::BLOCK         => "Blocked"
    ];

    protected $appends = ['user_status'];
    protected $fillable = [
        'username',
        'status',
        'email',
        'password',
        'role',
    ];

    /**
     * @return HasMany
     */
    public function order(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
