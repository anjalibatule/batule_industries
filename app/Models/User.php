<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone','image'
    ];

    /**
     * Mutator: Capitalize each word in name when setting.
     */
    public function setNameAttribute($val)
    {
        $this->attributes['name'] = ucwords($val);
    }

    /**
     * Accessor: Capitalize each word in name when getting.
     */
    public function getNameAttribute($val)
    {
        return ucwords($val);
    }

    /**
     * Mutator: Format phone with +91 prefix when setting.
     */
    public function setPhoneAttribute($val)
    {
        $this->attributes['phone'] = $val; // Store raw number in DB
    }

    /**
     * Accessor: Add +91- prefix when retrieving phone.
     */
    public function getPhoneAttribute($val)
    {
        return "+91-" . $val;
    }

    /**
     * Attributes to hide in serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Attributes to cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
