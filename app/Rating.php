<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
  Protected $fillable =['user_id','total_rating', 'total_votes','post_id'];
  public function user()
    {
      return $this->belongsTo(Post::class);
    }
  
}
