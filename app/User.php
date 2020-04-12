<?php

namespace App;

use Gloudemans\Shoppingcart\Contracts\InstanceIdentifier;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements InstanceIdentifier
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the unique identifier to load the Cart from.
     *
     * @return int|string
     */
    public function getInstanceIdentifier($options = null) {
        return $this->email;
    }

    /**
     * Get the global discount rate for this instance.
     *
     * @return int|string
     */
    public function getInstanceGlobalDiscount($options = null) {
        return 0;
    }
}
