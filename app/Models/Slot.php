<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;

class Slot extends Model
{
    use HasFactory,Sluggable;
    use SoftDeletes;
    public function module()
    {
      return $this->belongsTo(Module::class,'module_id');
    }
    public function sluggable(): array
    {
      return[
        'slug'=>['source'=>'name']
      ];
    }
}
