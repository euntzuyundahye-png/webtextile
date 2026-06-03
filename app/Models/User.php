<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | RELATIONSHIP
    |--------------------------------------------------------------------------
    */

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    /*
    |--------------------------------------------------------------------------
    | ROLE CHECK
    |--------------------------------------------------------------------------
    */

    public function hasRole($role)
    {
        return $this->role &&
               $this->role->name === $role;
    }

    /*
    |--------------------------------------------------------------------------
    | PERMISSION CHECK
    |--------------------------------------------------------------------------
    */

    public function hasPermission($permission)
    {
        if (!$this->role) {
            return false;
        }

        return $this->role
            ->permissions()
            ->where('name', $permission)
            ->exists();
    }
}