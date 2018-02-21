<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    Protected $fillable =['name'];

    public function posts()
    {
      return $this->belongsToMany(Post::class);
    }

    public function getRouteKeyName()
    {
      return 'name';
    }
}
