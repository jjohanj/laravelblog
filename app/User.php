<?php

namespace App;


use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


use Zizaco\Entrust\Traits\EntrustUserTrait;

/*{

  use EntrustUserTrait; // add this trait to your user model
    ...
} */

class User extends Authenticatable
{
    use Notifiable;

      use EntrustUserTrait; // add this trait to your user model
    //  use HasRole;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'blog_name', 'email', 'password' , 'total_blogposts', 'user_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function vote()
    {
        return $this->hasMany(Vote::class);
    }

    public function followers()
{
    return $this->belongsToMany(User::class, 'followers', 'leader_id', 'follower_id')->withTimestamps();
}

/**
 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
 */
public function followings()
{
    return $this->belongsToMany(User::class, 'followers', 'follower_id', 'leader_id')->withTimestamps();
}


public function settings()
{
    return $this->hasMany(Setting::class);
}


public function paymentdetails()
{
    return $this->hasOne(Paymentdetails::class);
}



}
