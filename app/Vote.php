<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Vote extends Model
{
  Protected $fillable =['user_id', 'post_id','vote'];
  public function user()
    {
      return $this->belongsTo(User::class);
    }
}
