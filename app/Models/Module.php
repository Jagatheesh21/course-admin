<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Module extends Model
{
    use HasFactory;

    public function sections()
    {
        return $this->hasMany(ModuleSection::class);
    }
    public function course()
    {
      return $this->belongsTo(Course::class,'course_id');
    }
    public function sluggable(): array
    {
      return[
        'slug'=>['source'=>'name']
      ];
    }
}
