<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	//protected $guarded= ['id'];
	Protected $fillable =['title','category','body'];

	public function comments()
	{
		return $this->hasMany(Comment::class);

	}



}
