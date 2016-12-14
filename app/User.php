<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','photo_id','role_id','is_active'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role(){
        return $this->belongsTo('App\Role');
    }
    
    public function photo(){
        return $this->belongsTo('App\Photo');
    }

    public function isAdmin(){
        if ($this->role->name == 'Admin') {
            return true;
        }
        return false;
    }

     public function isAuthor(){
        if ($this->role->name == 'Author') {
            return true;
        }
        return false;
    }

    public function adverts(){
        return $this->hasMany('App\Advert');
    }

    public function comments(){
        return $this->hasMany('App\Comment');
    }

    public function messages(){
        return $this->hasMany('App\Message');
    }

    public function msgreplies(){
        return $this->hasMany('App\MsgReplay');
    }
    
    
    


}
