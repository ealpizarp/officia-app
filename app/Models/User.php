<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = "user";
    protected $fillable = [
        'legal_id',
        'name',
        'last_names',
        'phone_number',
        'email',
        'password',
        'type',
        'available',
        'profile_photo',
        'verification_photo',
        'address_id',
    ];

    public function service(){
        return $this->hasMany(Service::class, 'user_id', 'id');
    }

    public function reviews()
    {
        return $this->hasMany(Reviews::class, 'user_id', 'id');
    }

    public function report()
    {
        return $this->hasMany(Report::class, 'service_id', 'id');
    }

    public function address()
    {
        
        return $this->belongsTo(Address::class);
    }

        /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // public function hasRole(string $role): bool
    // {
    //     return $this->getAttribute('role') === $role;
    // }

    public function isAdmin(): bool
    {
        return $this->getAttribute('type') === 1;
    }

    public function isUser(): bool
    {
        return $this->getAttribute('type') === 0;
    }

}

