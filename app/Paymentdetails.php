<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Paymentdetails extends Model
{
  public function user()
    {
      return $this->belongsTo(User::class);
    }
}
