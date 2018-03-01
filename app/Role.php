<?php

namespace App;



use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
<<<<<<< HEAD
=======

>>>>>>> edffae01fec25e8e00f9abf4631693aa9914e2ab

  public function AttachRole($id){

    $user = User::find($id)->get();

// role attach alias
$user->attachRole($admin); // parameter can be an Role object, array, or id

// or eloquent's original technique
$user->roles()->attach($admin->id); // id only
  }

}

/* use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    $this->belongsTo(User::class);
}*/
