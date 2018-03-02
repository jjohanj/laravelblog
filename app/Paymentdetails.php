<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Paymentdetails extends Model
{

  protected $fillable = [
      'user_id','fullName', 'BIC', 'IBAN', 'country', 'email', 'password' , 'total_blogposts', 'user_id'
  ];

  public function user()
    {
      return $this->belongsTo(User::class);
    }
}
