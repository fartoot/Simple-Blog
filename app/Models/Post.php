<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function getRouteKeyName()
    {
        return 'slug';
    }
    
    public function User(){
        return $this->belongsTo(User::class);
    }
    
    public function Categories(){
        return $this->belongsTo(Category::class);
    }
    
    public function Tags(){
        return $this->belongsToMany(Tag::class);
    }
    
    
}
