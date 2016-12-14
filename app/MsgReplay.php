<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MsgReplay extends Model
{
    //
    protected $fillable=['receiver_id','sender_id','author','email','body','photo','message_id','receiver_name'];

    public function messages(){
    	return $this->belongsTo('App\Message');
    }
    
    public function user(){
    	return $this->belongsTo('App\User');
    }
}
