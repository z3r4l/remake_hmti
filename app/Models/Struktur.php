<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Struktur extends Model
{
    use HasFactory;

    protected $fillable = ['divisi_id', 'name', 'jabatan', 'image'];
    protected $table = 'strukturs';

    public function getRouteKeyName()
    {
        return 'slug';
    }
    
    public static function booted(){
        static::creating(function(Struktur $struktur){
            $struktur->slug     = strtolower(Str::slug($struktur->name. '-' . Str::random(3)));
        });
    }

    public function divisi()
    {
        return $this->belongsTo(Divisi::class);
    }
}
