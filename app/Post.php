<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class Post extends Model
{


	Protected $fillable =['user_id', 'title','body','disable_comments','post_id'];

	public function comments()
	{
		return $this->hasMany(Comment::class);

	}
	public function rating()
	{
			return $this->hasOne(Rating::class);
	}
	public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function scopeFilter($query, $filters)
    {

      	if (isset($filters['month'])) {

      		$query->whereMonth('created_at', Carbon::parse($filters['month'])->month);
        }

       	if (isset($filters['year'])) {

            $query->whereYear('created_at', $filters['year']);
        }
        if (isset($filters['user_id'])) {

            $query->where('user_id', $filters['user']);
        }
        if (isset($filters['search'])) {

            $query->where('title','LIKE','%'.$filters['search'].'%')->orWhere('body','LIKE','%'.$filters['search'].'%');
        }




    }





	public function categories()
		{
			return $this->belongsToMany(Category::class);
		}

}
