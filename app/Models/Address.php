<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $primaryKey="id";
    protected $table = "address";
    protected $fillable = ["name",'province_id'];

    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function service()
    {
        return $this->hasMany(Service::class, 'address_id', 'id');
    }

    public function user()
    {
        return $this->hasMany(User::class, 'address_id', 'id');
    }
}
