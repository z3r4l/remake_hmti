<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Carbon;

class Post extends Model
{
    use HasFactory;
    // use SoftDeletes;

    protected $fillable = ['title', 'category_id', 'link', 'image', 'body'];
    protected $table    = 'posts';
  
    // protected $dates = ['deleted_at'];

    public static function booted()
    {
        static::creating(function(Post $posts){
            $posts->slug     = strtolower(Str::slug($posts->title. '-' . Str::random(3)));
        });
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }


    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->whereNull('parent_id');
    }

    public function getCreatedAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])
            ->isoFormat('dddd, D MMMM Y H:M');
    }
}
