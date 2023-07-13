<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Repository extends Model
{
    use HasFactory;
    
    protected $fillable = ['name'];
    protected $table = 'repositories';
    // protected $casts = [ 'time' => 'datetime:Y/m' ];
    // protected $dateFormat = 'm-Y';


    public function contents()
    {
        return $this->hasMany(RepositoryContent::class);
    }
    
    public static function booted()
    {
        static::creating(function(Repository $repository){
            $repository->slug     = strtolower(Str::slug($repository->name. '-' . Str::random(3)));
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

}
