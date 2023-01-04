<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
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

    public function address()
    {
        
        return $this->belongsTo(Address::class);
    }

}

