<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	//protected $guarded= ['id'];
	Protected $fillable =['title','category','body', 'disable_comments'];

	public function comments()
	{
		return $this->hasMany(Comment::class);

	}



}
