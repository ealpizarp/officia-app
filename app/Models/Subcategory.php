<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;
    protected $primatyKey="id";
    protected $foreingKey='category_id';
    protected $table = "subcategory";
    protected $fillable = ["name",'category_id'];

    public function category()
    {
        return $this->belongsToMany(Category::class);
    }

    public function service(){
        return $this->hasMany(Service::class, 'subcategory_id', 'id');
    }
}
