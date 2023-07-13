<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RepositoryContent extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'time', 'link', 'repository_id'];
    protected $table = 'repository_contents';


    public static function booted()
    {
        static::creating(function(RepositoryContent $repositoryContent){
            $repositoryContent->slug                = strtolower(Str::slug($repositoryContent->name. '-' . Str::random(3)));
            // $repositoryContent->repository_id       = $repository->id;
        });
    }
    
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function repository()
    {
        return $this->belongsTo(Repository::class);
    }

}
