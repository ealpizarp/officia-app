<?php

namespace App\Models;

use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'image', 'price', 'seller', 'location', 'email', 'tags', 'description'];

    public function scopeFilter($query, array $filters) {


        if($filters['tag'] ?? false) {
            $query->where('tags', 'like', '%'. request('tag') . '%');
        }

        if($filters['search'] ?? false) {

            $query->where('title', 'like', '%' . request('search') . '%')

            ->orWhere('description', 'like', '%' . request('search') . '%')

            ->orWhere('tags', 'like', '%' . request('search') . '%');
        }

    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable')->whereNull('parent_id');
    }
    
}
