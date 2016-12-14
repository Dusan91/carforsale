<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //
    protected $fillable=['receiver_id','sender_id','is_active','author','email','body','photo'];

    public function msgreply(){
    	return $this->hasMany('App\MsgReplay');
    }
    
    public function user(){
 
    	return $this->belongsTo('App\User');
 
	}
}
