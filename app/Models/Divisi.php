<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Divisi extends Model
{
    use HasFactory;

    protected $fillable = ['name','slug', 'image', 'definisi'];
    protected $table    = 'divisis';


    public static function booted()
    {
        static::creating(function(Divisi $divisi){
            $divisi->slug     = strtolower(Str::slug($divisi->name));
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function strukturs()
    {
        return $this->hasMany(Struktur::class);
    }

}
