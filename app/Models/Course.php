<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class Course extends Model
{
    use HasFactory,Sluggable;
    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function author(){
        return $this->belongsTo(User::class, 'author_id');
    }
    public function sluggable(): array
    {
      return[
        'slug'=>['source'=>'name']
      ];
    }
}