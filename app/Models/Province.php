<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;
    protected $primaryKey="id";
    protected $table = "province";
    protected $fillable = ["name"];

    public function address(){
        return $this->hasMany(Address::class, 'province_id', 'id');
    }
}