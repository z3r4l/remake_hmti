<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];
    protected $table    = 'categories';

    
    public static function booted()
    {
        static::creating(function(Category $category){
            $category->slug     = strtolower(Str::slug($category->name. '-' . Str::random(3)));
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function post(){
        return $this->hasMany(Post::class);
    }
}
