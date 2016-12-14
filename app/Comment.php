<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
	protected $fillable=[
	'advert_id','is_active','author','email','body','photo'
	];

	 public function replies(){
    	return $this->hasMany('App\CommentReply');
    }

    public function advert(){
 
    return $this->belongsTo('App\Advert');
 
	}
	
}
